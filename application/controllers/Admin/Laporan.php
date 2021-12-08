<?php

class Laporan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /*if (!isset($this->session->userdata['warga'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Maaf, Anda bukan Admin! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('user/dashboard');
        }*/
    }

    public function index()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datau = ['username'  =>  $datau->username];
        $datab['humas_lapor'] = $this->laporan_model->getDataLaporan()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/laporan', $datab);
        $this->load->view('templates_admin/footer');
    }

    public function delete($id)
    {
        $where = ['id_lapor' => $id];
        $this->laporan_model->deleteDataLaporan($where, 'humas_lapor');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Laporan berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/laporan');
    }

}