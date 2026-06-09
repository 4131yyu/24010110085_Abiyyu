<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FakultasModel extends CI_Model {

    public function getAll()
    {
        return $this->db->get('fakultas')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('fakultas', [
            'fakultas_id' => $id
        ])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('fakultas', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('fakultas_id', $id);
        return $this->db->update('fakultas', $data);
    }

    public function delete($id)
    {
        $this->db->where('fakultas_id', $id);
        return $this->db->delete('fakultas');
    }

}