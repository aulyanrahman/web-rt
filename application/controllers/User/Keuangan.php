<?php

class Keuangan extends CI_Controller{

    public function index()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datau = ['username'  =>  $datau->username];

        $jumlahm = $this->db->query("SELECT SUM(jumlah) AS totalm FROM keuangan_masuk")->row_array();
        $jumlahk = $this->db->query("SELECT SUM(jumlah) AS totalk FROM keuangan_keluar")->row_array();
		$jumlah = array_merge($jumlahm, $jumlahk);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_user/sidebar', $datau);
        $this->load->view('user/keuangan', $jumlah);
        $this->load->view('templates_admin/footer');
    }

}