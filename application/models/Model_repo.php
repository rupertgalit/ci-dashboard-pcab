<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Model_repo extends CI_Model
 {

    public function select_refNumber( $data )
    {
        $qry = 'select callback_uri,status from transactions where reference_number like ? ';
        $Q = $this->db->query( $qry, $data );
        return $Q->row_array()?$Q->row_array():false;

    }

    public function chk_ref_no( $postdata )
    {
        $qry = 'select deposit_reference_no from tbl_deposit where deposit_reference_no like ? ';
        $Q = $this->db->query( $qry, $postdata['deposit_reference_no'] );
        return $Q->row_array()?$Q->row_array():false;

    }

    public function finddata( $data )
    {
        $qry = 'select * from tbl_callback where reference_number like ? ';
        $Q = $this->db->query( $qry, $data );
        return $Q->row_array()?$Q->result_array():false;

    }

    public function allDepositData()
    {
        $qry = 'select * from tbl_deposit ';
        $Q = $this->db->query( $qry );
        return $Q->row_array()?$Q->result_array():false;
    }

    public function insertApiLogs( $data ) 
    {
        $lastId = $this->db->insert_id( $this->db->insert( 'api_logs', $data ) );
        return $lastId;
    }

    
    public function  log_deposit($data) 
    {
        return  $this->db->insert_id( $this->db->insert( 'tbl_deposit', $data ) );
    }
    public function depositTransaction( $data )
    {
        return    $this->db->insert( 'tbl_depost_transaction', $data ) ;
         
    }
    public function  total_transcation_perday($request) 
    {
        $result="SELECT COUNT(*) AS ttl_trnsact, sum(txn_amount) as txn_amt,
        sum(legal_research_fund) as lrfund,
        sum(document_stamp_tax) as ds_tax,
        sum(fees_pcab) as feespcab,sum(no_ngsi_fee) as nongsifee,
        sum(ngsi_convenience_fee) as ngsi_convfee
          FROM pcab_db.transactions where status ='SUCCESS' and date BETWEEN 
          '".$request['collection_date_from']."' AND '".$request['collection_date_to']."';";
          $data = $this->db->query($result);
          return $data->row_array() ? $data->row_array() : false;
    }

   public function total_txn_amount($request)
   {
    $result="SELECT sum(txn_amount) as txn_amt
    
      FROM pcab_db.transactions where status ='SUCCESS' and date BETWEEN 
      '".$request['collection_date_from']."' AND '".$request['collection_date_to']."';";
      $data = $this->db->query($result);
      return $data->row_array() ? $data->row_array() : false;
   }


   public function last_data_deposit(){
    $result ="SELECT *
    FROM pcab_db.tbl_deposit
    ORDER BY dep_id DESC LIMIT 1";

    $data = $this->db->query($result);
    return $data->row_array() ? $data->row_array() : false;

   }

     
    public function doInsertCallback( $data ) 
    {

        $lastId = $this->db->insert_id( $this->db->insert( 'tbl_callback', $data ) );
        return    $lastId;
    }

    public function transaction_log( $data ) 
    {

        $lastId = $this->db->insert_id( $this->db->insert( 'transactions', $data ) );
        return $lastId;
    }

    public function doUpdateApilogs( $update, $where )
    {

        $this->db->where( 'api_id', $where )->update( 'api_logs', $update );
        return $this->db->affected_rows();
    }

    public function updateTransaction( $update, $where ) 
    {

        $this->db->where( 'reference_number', $where )->update( 'transactions', $update );
        return $this->db->affected_rows();

    }

    public function updateCallBack( $update, $where ) 
    {
        $this->db->where( 'tbl_id', $where )->update( 'tbl_callback', $update );
        return $this->db->affected_rows();

    }

    public function transaction_data() 
    {
        $sql = 'SELECT * FROM transactions';
        $Q = $this->db->query( $sql );
        return $Q->row_array()?$Q->result_array():false;
    }

}
