<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('auth', 'refresh');
		}
	}

    public function index()
	{
        $header['title'] = "Dashboard";

		$this->load->view('layout/header', $header);
		$this->load->view('dashboard/index');
		$this->load->view('layout/footer');
	}
}
