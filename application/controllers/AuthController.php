<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('CrudModel');

		

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *        
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 
	public function index()
	{
		
		$this->load->view('admin/admin_dashboard');
	}

	public function test()
	{
		$this->load->view('hello');
	}


	public function display_data(){
 
		// ## With Model ####
		// $result['data']=$this->CrudModel->display_record();

		// ## Without Model ####
		$result['data']=$this->db->select('*')
                    ->from('payment_transaction')
                    ->get()->result_array();

		$this->load->view('admin/admin_dash',$result);
	}

	public function test_api(){

		$query=$this->db->query("SELECT * FROM payment_transaction");
		echo json_encode ($query->result_array());
		
	}
}
