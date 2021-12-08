<?php

class User_model extends CI_Model{

    public $table = 'user';
    public $id = 'id';

    public function getDataUser($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }

    public function showDataUser($table)
    {
        return $this->db->get($table);
    }

    public function addDataUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function editUser($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editDataUser($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteDataUser($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}