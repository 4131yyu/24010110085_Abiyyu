<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('auth', 'refresh');
		}

		$this->load->model('MahasiswaModel');
	}

    public function index()
	{
        $data['mahasiswa'] = $this->MahasiswaModel->getAll();
		
        $header['title'] = "Mahasiswa";
		$this->load->view('layout/header', $header);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('mahasiswa_nim', 'NIM', 'required|numeric|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('mahasiswa_nama', 'Nama', 'required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('mahasiswa_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mahasiswa_password', 'Password', 'required|min_length[5]');

			if ($this->form_validation->run() === TRUE) {
				$formulir = $this->input->post();

				$data = [
					'mahasiswa_nim' => $formulir['mahasiswa_nim'],
					'mahasiswa_nama' => $formulir['mahasiswa_nama'],
					'mahasiswa_email' => $formulir['mahasiswa_email'],
					'mahasiswa_password' => sha1($formulir['mahasiswa_password']),
				];

				$this->MahasiswaModel->insert($data);
				
				$this->session->set_flashdata('swal', [
					'icon' => 'success',
					'title' => 'Berhasil!',
					'text' => 'Data mahasiswa berhasil ditambahkan.'
				]);

				redirect('mahasiswa');
			}
		}

		$data['mahasiswa'] = null;
		$data['action'] = base_url('mahasiswa/tambah');
		$data['button'] = 'Simpan';
		
		$header['title'] = 'Tambah Mahasiswa';
		$this->load->view('layout/header', $header);
		$this->load->view('mahasiswa/form', $data);
		$this->load->view('layout/footer');
	}

	public function ubah($id)
	{
		$mahasiswa = $this->MahasiswaModel->getById($id);

		if (!$mahasiswa) {
			$this->session->set_flashdata('swal', [
				'icon' => 'warning',
				'title' => 'Tidak Ditemukan!',
				'text' => 'Data mahasiswa tidak ditemukan.'
			]);

			redirect('mahasiswa');
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('mahasiswa_nim', 'NIM', 'required|numeric|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('mahasiswa_nama', 'Nama', 'required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('mahasiswa_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mahasiswa_password', 'Password', 'min_length[5]');

			if ($this->form_validation->run() === TRUE) {
				$formulir = $this->input->post();

				$data = [
					'mahasiswa_nim' => $formulir['mahasiswa_nim'],
					'mahasiswa_nama' => $formulir['mahasiswa_nama'],
					'mahasiswa_email' => $formulir['mahasiswa_email'],
				];

				if (!empty($formulir['mahasiswa_password'])) {
					$data['mahasiswa_password'] = sha1($formulir['mahasiswa_password']);
				}

				$this->MahasiswaModel->update($id, $data);
				
				$this->session->set_flashdata('swal', [
					'icon' => 'success',
					'title' => 'Berhasil!',
					'text' => 'Data mahasiswa berhasil diupdate.'
				]);

				redirect('mahasiswa');
			}

			$mahasiswa = $this->input->post();
		}

		$data['mahasiswa'] = $mahasiswa;
		$data['action'] = base_url('mahasiswa/ubah/' . $id);
		$data['button'] = 'Update';
		
		$header['title'] = 'Ubah Mahasiswa';
		$this->load->view('layout/header', $header);
		$this->load->view('mahasiswa/form', $data);
		$this->load->view('layout/footer');
	}

	public function hapus($id)
	{
		$mahasiswa = $this->MahasiswaModel->getById($id);

		if (!$mahasiswa) {
			$this->session->set_flashdata('swal', [
				'icon' => 'warning',
				'title' => 'Tidak Ditemukan!',
				'text' => 'Data mahasiswa tidak ditemukan.'
			]);

			redirect('mahasiswa');
		}

		$this->MahasiswaModel->delete($id);

		$this->session->set_flashdata('swal', [
			'icon' => 'warning',
			'title' => 'Dihapus!',
			'text' => 'Data mahasiswa berhasil dihapus.'
		]);

		redirect('mahasiswa');
	}
}
