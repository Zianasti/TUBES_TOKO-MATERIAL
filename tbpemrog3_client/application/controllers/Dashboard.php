<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('KEY') != '') {
			$this->load->view('dashboard/index');
		}
		else {
			redirect('auth');
		}
	}
}
