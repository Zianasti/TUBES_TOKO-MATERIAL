<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model'); 
        $this->load->library('form_validation'); //load fom validation
		$this->load->library('session');
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function login() {
		$data = [
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
		];

		$insert = $this->Auth_model->loginAttempt($data);
		if($insert['status'] == 'Login Berhasil'){
			$this->session->set_flashdata('flash','Login Berhasil!');
			redirect('dashboard');
		}elseif ($insert['status'] == 'Login Gagal') {
			$this->session->set_flashdata('message','Username atau Password Salah!');
			redirect('auth');
		}else{
			$this->session->set_flashdata('message', 'Login Error!');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->load->view('register');
	}
}
