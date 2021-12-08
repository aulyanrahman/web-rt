<?php

class Laporan extends CI_Controller{

    public function index()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $datau->username];
        $data = [
            'nm_warga'  => set_value('nm_warga'),
            'jenis'     => set_value('jenis'),
            'uraian'    => set_value('uraian'),
            'status'    => set_value('status'),
            'tgl'       => set_value('tgl'),
            'id_user'   => set_value('id_user')
        ];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_user/sidebar', $datau);
        $this->load->view('user/laporan_form', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_laporan()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'nm_warga'  => $this->input->post('nm_warga', true),
                'jenis'     => $this->input->post('jenis', true),
                'uraian'    => $this->input->post('uraian', true),
                'status'    => $this->input->post('status', true),
                'tgl'       => $this->input->post('tgl', true),
                'id_user'   => $this->input->post('id_user', true)
            ];

            $this->laporan_model->addDataLaporan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Laporan berhasil dikirim! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('user/laporan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_warga', 'nm_warga', 'required');
        $this->form_validation->set_rules('jenis', 'jenis', 'required');
        $this->form_validation->set_rules('uraian', 'uraian', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
    }

}