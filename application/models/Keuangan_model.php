<?php

class Keuangan_model extends CI_Model{

    public function getDataKeuanganMasuk()
    {
        return $this->db->get('keuangan_masuk');
    }

    public function getDataKeuanganKeluar()
    {
        return $this->db->get('keuangan_keluar');
    }

    public function addDataUangmasuk($data)
    {
        $this->db->insert('keuangan_masuk', $data);
    }

    public function addDataUangkeluar($data)
    {
        $this->db->insert('keuangan_keluar', $data);
    }

    public function editKeuangan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editDataKeuangan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteDataKeuangan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}