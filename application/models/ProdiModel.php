<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdiModel extends CI_Model {

    public function getAll()
    {
        $this->db->select('prodi.*, fakultas.fakultas_name');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id');

        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('prodi', [
            'prodi_id' => $id
        ])->row_array();
    }
    
}