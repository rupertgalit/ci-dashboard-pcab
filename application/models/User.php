<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{

	public function get_user($username) {
        
        $this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('UserName', $username);
		$query = $this->db->get();

		// $qry="select * from tbl_iselco_data";
        // $Q= $this->db->query($qry);
        // return $Q->row_array()?$Q->result_array():false;
        
        // Return the user row as an array
        return $query->row_array();

        // $this->db->where('UserName', $username);
        // $query = $this->db->get('tbl_user'); // 
        // if ($query->num_rows() == 1) {
        //     return $query->row();
        // } else {
        //     return false; 
        // }

	}

	
}
