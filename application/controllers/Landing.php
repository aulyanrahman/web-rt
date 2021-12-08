<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['humas_berita'] = $this->berita_model->getDataBerita()->result();
		$jumlahm = $this->db->query("SELECT SUM(jumlah) AS totalm FROM keuangan_masuk")->row_array();
        $jumlahk = $this->db->query("SELECT SUM(jumlah) AS totalk FROM keuangan_keluar")->row_array();

		$data = array_merge($data, $jumlahm, $jumlahk);
		
		$this->load->view('landing', $data);
	}
}