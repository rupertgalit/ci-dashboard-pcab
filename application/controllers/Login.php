<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $UserType = $this->user->get_user($username);
        if ($UserType !== false) {
            $user_data = array(
                'username' => "admin",
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);

            if ($UserType->Password == md5($password)) {






                redirect($this->redirect($UserType)->UserType);
                
            }else{
                echo "
                <script>
                    alert('Wrong Password.');
                    window.location.href = '" . base_url('/login') . "';
                </script>
            ";
            }

        } else {
         echo "
            <script>
                alert('Account not found.');
                window.location.href = '" . base_url('/login') . "';
            </script>
        ";

        }

    }


    function redirect($type)
	{
		$caffeine = '';
		$map = [
			'superadmin' => 'deposit',
			'admin' => 'dashboard',

		];
		// $caffeine = $map[$type] ?? 'Not found';
		$caffeine = $map[$type];
		return $caffeine;
	}


    function logout()
	{
		$this->session->sess_destroy();

		redirect('login');
	}
}