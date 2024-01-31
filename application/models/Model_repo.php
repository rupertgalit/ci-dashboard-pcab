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

    public function finddata( $data )
    {
        $qry = 'select * from tbl_callback where reference_number like ? ';
        $Q = $this->db->query( $qry, $data );
        return $Q->row_array()?$Q->result_array():false;

    }

    public function insertApiLogs( $data ) 
    {
        $lastId = $this->db->insert_id( $this->db->insert( 'api_logs', $data ) );
        return $lastId;
    }

    
    public function  log_deposit($data) 
    {
       
        return $this->db->insert( 'tbl_deposit', $data );
    }

    public function  total_transcation_perday($request) 
    {
        $result="SELECT sum(txn_amount) as txn_amt,
        sum(legal_research_fund) as lrfund,
        sum(document_stamp_tax) as ds_tax,
        sum(fees_pcab) as feespcab,
        sum(ngsi_convenience_fee) as ngsi_convfee
          FROM pcab_db.transactions where status ='SUCCESS' and date BETWEEN 
          '".$request['collection_date_from']."' AND '".$request['collection_date_from']."';";
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
