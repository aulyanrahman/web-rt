<?php

class Berita_model extends CI_Model{

    public function getDataBerita()
    {
        return $this->db->get('humas_berita');
    }

    public function addDataBerita($data)
    {
        $this->db->insert('humas_berita', $data);
    }

    public function editBerita($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editDataBerita($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteDataBerita($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}