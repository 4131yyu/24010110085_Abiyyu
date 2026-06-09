<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
	{
		parent::__construct();

		$this->load->model('MahasiswaModel');
	}

    public function index()
	{
		// Jika sudah login, redirect ke dashboard
		if ($this->session->userdata('user')) {
			redirect('dashboard');
		}

		$data['error'] = null;

		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			if ($this->form_validation->run() === TRUE) {
				$formulir = [
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				];

				$status = $this->MahasiswaModel->checkAccount($formulir);

				if ($status) {
					redirect('dashboard');
				} else {
					$data['error'] = 'Email atau password salah. Periksa kembali akun anda.';
				}
			}
		}

		$this->load->view('auth/login', $data);
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }
}
