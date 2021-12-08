<?php

class Berita extends CI_Controller{

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
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $data->username];
        $data['humas_berita'] = $this->berita_model->getDataBerita()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/berita', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $datau->username];
        $data = [
            'judul'     => set_value('judul'),
            'tgl'       => set_value('tgl'),
            'gambar'    => set_value('gambar'),
            'berita'    => set_value('berita'),
            'id_admin'  => set_value('id_admin'),
        ];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/berita_form', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_berita()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'judul'     => $this->input->post('judul', true),
                'tgl'       => $this->input->post('tgl', true),
                'gambar'    => $this->input->post('gambar', true),
                'berita'    => $this->input->post('berita', true),
                'id_admin'  => $this->input->post('id_admin', true)
            ];

            $this->berita_model->addDataBerita($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berita berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/berita');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('berita', 'berita', 'required');
        $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
    }

    public function edit($id)
    {
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $data->username];
        $where = ['id_berita' => $id];
        $data['humas_berita'] = $this->berita_model->editBerita($where, 'humas_berita')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/berita_edit', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_berita()
    {
        $id         = $this->input->post('id_berita');
        $judul      = $this->input->post('judul');
        $tgl        = $this->input->post('tgl');
        $gambar     = $this->input->post('gambar');
        $berita     = $this->input->post('berita');
        $id_admin   = $this->input->post('id_admin');

        $data = [
            'judul'     => $judul,
            'tgl'       => $tgl,
            'gambar'    => $gambar,
            'berita'    => $berita,
            'id_admin'  => $id_admin,
        ];

        $where = [
            'id_berita' => $id
        ];

        $this->berita_model->editDataBerita($where, $data, 'humas_berita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berita berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/berita');
    }

    public function delete($id)
    {
        $where = ['id_berita' => $id];
        $this->berita_model->deleteDataBerita($where, 'humas_berita');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Berita berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/berita');
    }

}