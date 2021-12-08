<?php

class Global_model extends CI_Model{

    public function getData()
    {
        return $this->db->get($table);
    }

    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}