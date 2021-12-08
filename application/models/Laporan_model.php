<?php

class Laporan_model extends CI_Model{

    public function getDataLaporan()
    {
        return $this->db->get('humas_lapor');
    }

    public function addDataLaporan($data)
    {
        $this->db->insert('humas_lapor', $data);
    }

    public function editLaporan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editDataLaporan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteDataLaporan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}