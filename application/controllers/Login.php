<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function index() {
        if ($this->is_user_logged_in()) {
            redirect('dashboard');
        }
        else {
        $this->load->view('admin/login');
        }
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $user = $this->user->get_user($username);
        if ($user && $password === $user['Password']) {
            // echo $user['UserType'];
            // if ($UserType->Password == md5($password)) {
                $user_data = array(
                    'username' => "admin",
                    'logged_in' => TRUE,
                    'usertype' => $user['UserType'],
                    'fullname' => $user['Fullname']
                );
                $this->session->set_userdata($user_data);
                redirect('dashboard');

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

    private function is_user_logged_in()
	{
		// Check if the 'logged_in' session variable exists and is set to TRUE
		return $this->session->userdata('logged_in') === TRUE;
	}
}