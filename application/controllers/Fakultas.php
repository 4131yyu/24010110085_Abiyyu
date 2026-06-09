<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth', 'refresh');
        }

        $this->load->model('FakultasModel');
    }

    public function index()
    {
        $data['fakultas'] = $this->FakultasModel->getAll();

        $header['title'] = "Fakultas";
        $this->load->view('layout/header', $header);
        $this->load->view('fakultas/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('fakultas_id','ID Fakultas','required|numeric');
            $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'required|min_length[3]|max_length[100]');
            if ($this->form_validation->run() === TRUE) {
                $formulir = $this->input->post();

                $data = [
                    'fakultas_id' => $formulir['fakultas_id'],
                    'fakultas_name' => $formulir['fakultas_name'],
                ];

                $this->FakultasModel->insert($data);

                $this->session->set_flashdata('swal', [
                    'icon' => 'success',
                    'title' => 'Berhasil!',
                    'text' => 'Data Fakultas berhasil ditambahkan.'
                ]);

                redirect('fakultas');
            }
        }

        $data['fakultas'] = null;
        $data['action'] = base_url('fakultas/tambah');
        $data['button'] = 'Simpan';

        $header['title'] = 'Tambah Fakultas';
        $this->load->view('layout/header', $header);
        $this->load->view('fakultas/form', $data);
        $this->load->view('layout/footer');
    }

    public function ubah($id)
    {
        $fakultas = $this->FakultasModel->getById($id);

        if (!$fakultas) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text' => 'Data fakultas tidak ditemukan.'
            ]);

            redirect('fakultas');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('fakultas_id','ID Fakultas','required|numeric');
            $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'required|min_length[3]|max_length[100]');

            if ($this->form_validation->run() === TRUE) {
                $formulir = $this->input->post();

                $data = [
                    'fakultas_id' => $formulir['fakultas_id'],
                    'fakultas_name' => $formulir['fakultas_name'],
                ];

                

                $this->FakultasModel->update($id, $data);

                $this->session->set_flashdata('swal', [
                    'icon' => 'success',
                    'title' => 'Berhasil!',
                    'text' => 'Data Fakultas berhasil diupdate.'
                ]);

                redirect('fakultas');
            }

            $fakultas = $this->input->post();
        }

        $data['fakultas'] = $fakultas;
        $data['action'] = base_url('fakultas/ubah/' . $id);
        $data['button'] = 'Update';

        $header['title'] = 'Ubah Fakultas';
        $this->load->view('layout/header', $header);
        $this->load->view('fakultas/form', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $fakultas = $this->FakultasModel->getById($id);

        if (!$fakultas) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text' => 'Data fakultas tidak ditemukan.'
            ]);

            redirect('fakultas');
        }

        $this->FakultasModel->delete($id);

        $this->session->set_flashdata('swal', [
            'icon' => 'warning',
            'title' => 'Dihapus!',
            'text' => 'Data fakultas berhasil dihapus.'
        ]);

        redirect('fakultas');
    }
}
