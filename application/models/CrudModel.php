<?php

defined('BASEPATH') OR exit('No direct script access allowed');  

    class CrudModel extends CI_Model {

        public function __construct()  
        {  
           // Call the Model constructor  
           parent::__construct();  
        } 

        public function display_record()
        {

            return $query = $this->db->select('*')
                    ->from('payment_transaction')
                    ->get()->result_array();

            // $query-$this->db->get('payment_transaction');
            // return $query();
        }

        public function get_all_data()
        {
            
            $sql = 'SELECT * FROM transactions';
            $Q = $this->db->query( $sql );
            return $Q->row_array()?$Q->result_array():false;
            
        }
        public function all_deposit_data()
        {
            
            $sql = 'SELECT * FROM tbl_deposit';
            $Q = $this->db->query( $sql );
            return $Q->row_array()?$Q->result_array():false;
            
        }
    }

    ?>