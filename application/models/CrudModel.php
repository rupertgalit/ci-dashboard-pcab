<?php

defined('BASEPATH') OR exit('No direct script access allowed');  

    class CrudModel extends CI_Model {

        public function __construct()  
        {  
           // Call the Model constructor  
           parent::__construct();  
        } 

        public function display_record(){

            return $query = $this->db->select('*')
                    ->from('payment_transaction')
                    ->get()->result_array();

            // $query-$this->db->get('payment_transaction');
            // return $query();
        }

    }

    ?>