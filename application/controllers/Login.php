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
		

        // Validate against the database
        $user = $this->user->get_user($username);

        if ($user && $password === $user['Password']) {
            // Set user data in session
            $user_data = array(
                'username' => $username,
                'logged_in' => TRUE
            );
            redirect('welcome/index');  // Redirect to the dashboard or any other page after successful login
        } else {
            // Invalid login, redirect to login page with an error message
            // $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
			// echo "failed";
        }


    }
    function logout()
	{
		$this->session->sess_destroy();

		redirect('login/index');
	}
}