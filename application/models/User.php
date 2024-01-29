<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{

	public function get_user($username) {
        
		// $this->db->select('*');

        $this->db->where('UserName', $username);
        $query = $this->db->get('tbl_user'); // 
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false; 
        }

	}

	
}
