<?php

class Administrasi_model extends CI_Model{

    public function getDataAdministrasi()
    {
        return $this->db->get('admin_warga');
    }

    public function addDataAdministrasi($data)
    {
        $this->db->insert('admin_warga', $data);
    }

    public function editAdministrasi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editDataAdministrasi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteDataAdministrasi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}