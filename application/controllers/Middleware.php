<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';
require_once(APPPATH . 'services/ApiService.php');

class Middleware extends REST_Controller
{

    public $apiService;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->apiService = new ApiService();
        $this->load->model('Model_repo', 'model');
    }

    public function index_post()
    {

        // $last_data_deposit =     $this->model->last_data_deposit() ;

        // echo json_encode( $last_data_deposit );
        $this->response([
            'messege' => 'FORBIDDEN'
        ], Rest_Controller::HTTP_FORBIDDEN);
    }

    public function index_get()
    {
        $this->response([
            'messege' => 'FORBIDDEN'
        ], Rest_Controller::HTTP_FORBIDDEN);
    }

    private function call_external_api($data, $get_header)
    {
        // RE-WRITE $DATA FOR TESTING PURPOSES
        $response = $this->apiService->call_external_api($data, $get_header);
        return $response;
    }

    public function generate_qr_post()
    {
        $this->output->set_content_type('application/json');

        $header = apache_request_headers();

        $data['data'] = json_decode(file_get_contents('php://input'), true);

        $transaction['endpoint'] = $data['data']['endpoint'];
        $transaction['reference_number'] = $data['data']['reference_number'];

        $validate_ref = $this->model->select_refNumber($transaction['reference_number']);
        if ($validate_ref) {
            $this->response([
                'error' => true,
                'messege' => 'Transaction with this client ref ' . $transaction['reference_number'] . ' already exists.',

            ], Rest_Controller::HTTP_UNAUTHORIZED);
        }

        $txnAmount = $data['data']['merchant_details']['txn_amount'];

        $transaction['method'] = $data['data']['merchant_details']['method'];

        $transaction['txn_type'] = $data['data']['merchant_details']['txn_type'];

        $transaction['mobile_number'] = $data['data']['merchant_details']['scanner_mobile_number'];

        // $transaction[ 'city' ] = $data[ 'data' ][ 'merchant_details' ][ 'city' ];

        $transaction['txn_amount'] = $txnAmount;
        $transaction['date_created'] = date('Y-m-d H:i:s');
        $transaction['date'] = date('Y/m/d');
        $transaction['status'] = 'STARTED';

        $totalAmount = 0;

        foreach ($data['data']['other_details'] as $item) {

            $itemName = $item['item'];
            $amount = $item['amount'];
            // Sanitize and validate column name ( replace non-alphanumeric characters )
            $columnName = preg_replace('/[^a-zA-Z0-9_]/', '', $itemName);

            $transaction[$columnName] = $amount;

            // $totalAmount += $amount;
        }

        foreach ($data['data']['other_details'] as $detail) {
            if ($detail['item'] != 'ngsi_convenience_fee' && isset($detail['amount'])) {
                $totalAmount += is_numeric($detail['amount']) ? $detail['amount'] : 0;
            }
        }
        // if ( $txnAmount != $totalAmount ) {

        //     $this->response( [

        //         'error' => 'True',
        //         'messege' => 'the txn_amount in not equal of total other_details amount'
        // ], Rest_Controller::HTTP_UNAUTHORIZED );
        // }

        $get_header = $header['Authorization'];

        $params = json_encode($data['data']);

        $ins_data['params'] = $params;

        $ins_data['request_at'] = date('Y-m-d H:i:s');

        $ins_data['method'] = $_SERVER['REQUEST_METHOD'];

        $get_id = $this->model->insertApiLogs($ins_data);

        if ($get_id) {
            $transaction['callback_uri'] = $data['data']['callback_uri'];
            $transaction['no_ngsi_fee'] =  $totalAmount;
            $get_transaction_id = $this->model->transaction_log($transaction);

            if (isset($data['data']['callback_uri'])) {
                unset($data['data']['callback_uri']);
            }

            if (isset($data['data']['other_details'])) {
                unset($data['data']['other_details']);
            }

            $data['data']['callback_uri'] = base_url() . 'middleware/postback/?ref=' . $data['data']['reference_number'];

            $response = $this->call_external_api($data['data'], $get_header);

            $update['response_at'] = date('Y-m-d H:i:s');

            $update['status'] = $response['status_code'];

            $update['api_response'] = $response['response'] . $data['data']['callback_uri'];

            $doUpdateApiLog = $this->model->doUpdateApilogs($update, $get_id);

            if ($doUpdateApiLog) {
                // echo $totalAmount;
                // echo json_encode($data['data']['callback_uri']);
                echo $response['response'];
            }
        }
    }

    public function postback_post($ref_number = 0)
    {
        $ref_number = $_GET['ref'];

        $this->output->set_content_type('application/json');

        $data = json_decode(file_get_contents('php://input'), true);

        $data_exist = $this->model->finddata($ref_number);

        $call_back_data['reference_number'] = $ref_number;

        $call_back_data['callback_data'] = json_encode($data);

        $call_back_data['tbl_date'] = date('Y-m-d H:i:s');

        $call_back_data['TxId'] = $data['TxId'];

        $call_back_data['referenceNumber'] = $data['referenceNumber'];

        $call_back_data['callback_status'] = $data['status'];

        if ($data_exist != false) {

            $this->model->doInsertCallback($call_back_data);
            $this->response([
                'messege' => 'Failed',
                'error' => 'already transact'
            ], Rest_Controller::HTTP_UNAUTHORIZED);
        } else {

            // / insert data to tbl_callback
            $do_cback_data = $this->model->doInsertCallback($call_back_data);

            if ($do_cback_data) {
                $TransData = $this->model->select_refNumber($ref_number);
                // this client response
                $response = $this->apiService->call_back($data, $TransData['callback_uri']);
                $transData['status'] = $this->status_get($data['status']);
                $transData['TxId'] = $call_back_data['TxId'];
                $transData['referenceNumber'] = $call_back_data['referenceNumber'];

                $transData['last_modified'] = date('Y-m-d H:i:s');
                $trans_updated = $this->model->updateTransaction($transData, $ref_number);

                if ($trans_updated) {

                    $cback_update['client_data_resp'] = json_encode($response);
                    $doUpdateApiLog = $this->model->updateCallBack($cback_update, $do_cback_data);

                    if ($response['status_code'] == 200 || $response['status_code'] == 201) {

                        $this->response([
                            'messege' => 'Success',
                            'error' => 'false',
                            'data' => $doUpdateApiLog
                        ], Rest_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'messege' => 'Success',
                            'error' => 'true',
                            'data' => $doUpdateApiLog
                        ], Rest_Controller::HTTP_OK);
                    }
                }
            }
        }
    }

    function status_get($type)
    {
        $caffeine = '';
        $map = [
            '1' => 'STARTED ',
            '2' => 'PENDING',
            '3' => 'FAILED',
            '4' => 'SUCCESS'
        ];

        $caffeine = $map[$type];
        return $caffeine;
    }

    public function samplecallback_post()
    {
        $this->response([
            'messege' => 'Success',
            'error0' => 'false'
        ], Rest_Controller::HTTP_OK);
    }

    function validateDate( $data)
    {

        $dateTime2 = new DateTime($dateString2);
        $dayOfWeek1 = $dateTime->format('l');
        $dayOfWeek2 = $dateTime2->format('l');
        
        
        
                    if($dayOfWeek1 !=$dayOfWeek2){
        
        
                        if ($dayOfWeek1 == 'Friday' && $dayOfWeek2 == 'Sunday') {
        
                            $return=true;
                          
                        } else {
                            $return=false;
                           
                        }
                       
                    }else{
                    
                        $return=true;
                      
                    }
        
                      return  $return;

    }
    public function deposit_log_post()
    {

        $this->form_validation->set_rules('deposited_date', 'deposited date', 'required');
        // $this->form_validation->set_rules( 'deposited_amount', 'deposited amount', 'required' );
        // $this->form_validation->set_rules( 'deposit_reference_no', 'deposit reference number', 'required' );
        $this->form_validation->set_rules('collection_date_from', 'collection dater', 'required');
        $this->form_validation->set_rules('collection_date_to', 'collection dater', 'required');

        $this->output->set_content_type('application/json');

        switch ($_SERVER['CONTENT_TYPE']) {
            case 'application/json':

                $_POST = json_decode(file_get_contents('php://input'), true);
                $postdata = $_POST;

                break;
            default:

                $postdata = array(
                    'deposited_date' => $this->input->post('deposited_date'),
                    // 'deposited_amount' => $this->input->post( 'deposited_amount' ),
                    // 'deposit_reference_no' => $this->input->post( 'deposit_reference_no' ),
                    'collection_date_from' => $this->input->post('collection_date_from'),
                    'collection_date_to' => $this->input->post('collection_date_to'),

                );
        }

        $params = json_encode($postdata);

        $ins_data['params'] = $params;

        $ins_data['request_at'] = date('Y-m-d H:i:s');

        $ins_data['method'] = $_SERVER['REQUEST_METHOD'];

        $get_id = $this->model->insertApiLogs($ins_data);



        if ($this->form_validation->run() == FALSE) {

            $errors = str_replace('\n', '', strip_tags(validation_errors()));

            $this->response([
                'status' => false,
                'message' => 'Validation error',
                'data' =>  $errors,

            ], Rest_Controller::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            // $chkrefno = $this->model->chk_ref_no( $postdata );

            // if ( $chkrefno ) {

            //     $this->response( [
            //         'status' => false,
            //         'message' => 'reference already exist'
            //     ], Rest_Controller::HTTP_UNPROCESSABLE_ENTITY );

            // } else {

            // $deposit_transation['deposited_date'] = $postdata['deposited_date'];


            //   $valdate= $this->validateDate($data);

            $deposit_transation['document_stamp_tax'] = $postdata['document_stamp_tax']['amount'];

            $deposit_transation['dst_ref_no'] = $postdata['document_stamp_tax']['reference_no'];

            $deposit_transation['fees_pcab']  = $postdata['fees_pcab']['amount'];

            $deposit_transation['pcab_ref_no']  = $postdata['fees_pcab']['reference_no'];

            $deposit_transation['legal_research_fund'] = $postdata['legal_research_fund']['amount'];

            $deposit_transation['lrf_ref_no']  = $postdata['legal_research_fund']['reference_no'];

     

            $getTotalAmount =     $this->model->total_transcation_perday($postdata);
            $last_data_deposit =     $this->model->last_data_deposit();
            $Lupaid_collection = $last_data_deposit ? $last_data_deposit['undeposit_collection'] : 0;
            if ($last_data_deposit) {
                $depositLogs['last_txn_amont'] = $last_data_deposit['undeposit_collection'];
                $depositLogs['last_date'] = $last_data_deposit['created_at'];
            } else {
                $depositLogs['last_txn_amont'] = '';
                $depositLogs['last_date'] = '';
            }
            if ($getTotalAmount) {

                $depositLogs['deposited_date'] = $postdata['deposited_date'];

                $depositLogs['deposited_amount'] = $deposit_transation['document_stamp_tax'] + $deposit_transation['fees_pcab'] + $deposit_transation['legal_research_fund'];

                // $depositLogs[ 'deposit_reference_no' ] = $postdata[ 'deposit_reference_no' ];

                $depositLogs['txn_amount'] = $getTotalAmount['txn_amt'];

                $depositLogs['document_stamp_tax'] = $getTotalAmount['ds_tax'];

                $depositLogs['fees_pcab'] = $getTotalAmount['feespcab'];

                $depositLogs['legal_research_fund'] = $getTotalAmount['lrfund'];

                $depositLogs['ngsi_convenience_fee'] = $getTotalAmount['ngsi_convfee'];

                $depositLogs['ttl_trnsact'] = $getTotalAmount['ttl_trnsact'];

                $depositLogs['no_ngsi_fee'] = $getTotalAmount['nongsifee'];

                $depositLogs['created_at'] =  date('Y-m-d');

                $depositLogs['date_covered'] =  str_replace(array( '-'), '', $postdata['collection_date_from']) . str_replace(array( '-'), '', $postdata['collection_date_to']) ;
                  
                $val_trancation  =    $this->model->validateDepositTransaction($depositLogs);
                if($val_trancation !=false){
                    $this->response([
                        'status' => false,
                        'message' =>  'The date of collection was pre-deposited..',
                      
                    ], Rest_Controller::HTTP_UNPROCESSABLE_ENTITY);

                }
                $depositLogs['date_from'] = $postdata['collection_date_from'];

                $depositLogs['date_to'] = $postdata['collection_date_to'];

                $depositLogs['undeposit_collection'] = $Lupaid_collection + $getTotalAmount['nongsifee'] -  $depositLogs['deposited_amount'];
              
                $last_deposit_trans=$this->model->last_deposit_trnasaction();

                $deposit_trans_fees_pcab = $last_deposit_trans ? $last_deposit_trans['balance_fees_pcab'] : 0;
                $deposit_trans_dstax = $last_deposit_trans ? $last_deposit_trans['balance_document_stamp_tax'] : 0;
                $deposit_trans_lrf = $last_deposit_trans ? $last_deposit_trans['balance_legal_research_fund'] : 0;
 
                $deposit_transation['balance_fees_pcab']  =  $getTotalAmount['feespcab'] + $deposit_trans_fees_pcab - $postdata['fees_pcab']['amount'];

                $deposit_transation['balance_legal_research_fund']  =  $getTotalAmount['lrfund'] +$deposit_trans_lrf - $postdata['legal_research_fund']['amount'];

                $deposit_transation['balance_document_stamp_tax']  = $getTotalAmount['ds_tax'] + $deposit_trans_dstax - $postdata['document_stamp_tax']['amount'];

                $depositLogs['last_deposit_trans_id'] = $last_deposit_trans ? $last_deposit_trans['tbl_id'] : 0;

                //balidate balane
                     if($this->validateBalance($deposit_transation)==false){
                        $this->response([
                            'status' => false,
                            'message' =>  'Total amount exceed the expected amount.',
                            'data1'=>$deposit_transation,'data2'=>$last_deposit_trans,'getTotalAmount'=>$getTotalAmount
                        ], Rest_Controller::HTTP_UNPROCESSABLE_ENTITY);
                     };


                $lastid =      $this->model->log_deposit($depositLogs);
                if ($lastid) {
                    $deposit_transation['deposit_id'] = $lastid;
                    $this->model->depositTransaction($deposit_transation);
                }
            }

            $this->response([
                'status' => true,
                'message' =>  'Success',
                'data' => $lastid
            ], Rest_Controller::HTTP_OK);

            // }

        }
    }

    public function validateBalance($data)
    {
        if($data['balance_fees_pcab']<0){
              $result=false;
        } else if (  $data['balance_legal_research_fund']  <0){
            $result=false;
        }else if (  $data['balance_document_stamp_tax']  <0){
            $result=false;
        }else{
            $result=true;
        }
 
       return  $result;
        
    }

    public function all_deposit_data_get()
    {
        $depositData = $this->model->allDepositData();

        $deposit_transations_added = array_map(function ($data) {
            $transactions = $this->model->get_geposit_transaction($depositData["dep_id"]);
            $data["transactions"] = $transactions[0];
            return $data;
        }, $depositData);

        if ($depositData) {
            $result = $depositData;
        } else {
            $result = array();
        }

        $this->response([
            'status' => true,
            'message' => 'succes',
            'data' =>  $deposit_transations_added,
        ], Rest_Controller::HTTP_OK);
    }

    public function all_transaction_data_get()
    {
        $deposiitData =  $this->model->transaction_data();

        if ($deposiitData) {

            $result = $deposiitData;
        } else {
            $result = array();
        }

        $this->response([
            'status' => true,
            'message' => 'succes',
            'data' =>  $deposiitData,
        ], Rest_Controller::HTTP_OK);
    }

    public function total_txnamount_indate_post()
    {


        $this->form_validation->set_rules('collection_date_from', 'collection dater', 'required');
        $this->form_validation->set_rules('collection_date_to', 'collection dater', 'required');

        $this->output->set_content_type('application/json');

        switch ($_SERVER['CONTENT_TYPE']) {
            case 'application/json':

                $_POST = json_decode(file_get_contents('php://input'), true);
                $postdata = $_POST;

                break;
            default:

                $postdata = array(

                    'collection_date_from' => $this->input->post('collection_date_from'),
                    'collection_date_to' => $this->input->post('collection_date_to'),

                );
        }


        $params = json_encode($postdata);

        $ins_data['params'] = $params;

        $ins_data['request_at'] = date('Y-m-d H:i:s');

        $ins_data['method'] = $_SERVER['REQUEST_METHOD'];

        $get_id = $this->model->insertApiLogs($ins_data);

        if ($this->form_validation->run() == FALSE) {

            $errors = str_replace('\n', '', strip_tags(validation_errors()));

            $this->response([
                'status' => false,
                'message' => 'Validation error',
                'data' =>  $errors,

            ], Rest_Controller::HTTP_UNPROCESSABLE_ENTITY);
        } else {

            $amountData =  $this->model->total_txn_amount($postdata);


            $this->response([
                'status' => true,
                'message' => 'Success.                                                                                                                                                  ',
                'data' =>  $amountData,

            ], Rest_Controller::HTTP_OK);
        }
    }
}
