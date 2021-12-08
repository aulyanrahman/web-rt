<?php

class Keuangan extends CI_Controller{

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

        $jumlahm = $this->db->query("SELECT SUM(jumlah) AS totalm FROM keuangan_masuk")->row_array();
        $jumlahk = $this->db->query("SELECT SUM(jumlah) AS totalk FROM keuangan_keluar")->row_array();
		$jumlah = array_merge($jumlahm, $jumlahk);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/keuangan', $jumlah);
        $this->load->view('templates_admin/footer');
    }

    public function uangmasuk()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $datau->username];
        $data['keuangan_masuk'] = $this->keuangan_model->getDataKeuanganMasuk()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/uangmasuk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_um()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $datau->username];
        $data = [
            'tgl'       => set_value('tgl'),
            'ket'       => set_value('ket'),
            'jumlah'    => set_value('jumlah'),
            'id_admin'  => set_value('id_admin')
        ];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/uangmasuk_form', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_uangmasuk()
    {
        $this->_rules_um();

        if ($this->form_validation->run() == false) {
            $this->add_um();
        } else {
            $data = [
                'tgl'       => $this->input->post('tgl', true),
                'ket'       => $this->input->post('ket', true),
                'jumlah'    => $this->input->post('jumlah', true),
                'id_admin'  => $this->input->post('id_admin', true)
            ];

            $this->keuangan_model->addDataUangmasuk($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pemasukkan berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/keuangan/uangmasuk');
        }
    }

    public function _rules_um()
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('ket', 'ket', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
    }

    public function edit_um($id)
    {
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $data->username];
        $where = ['id_uangmasuk' => $id];
        $data['keuangan_masuk'] = $this->keuangan_model->editKeuangan($where, 'keuangan_masuk')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/uangmasuk_edit', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_uangmasuk()
    {
        $id         = $this->input->post('id_uangmasuk');
        $tgl        = $this->input->post('tgl');
        $ket        = $this->input->post('ket');
        $jumlah     = $this->input->post('jumlah');
        $id_admin   = $this->input->post('id_admin');

        $data = [
            'tgl'       => $tgl,
            'ket'       => $ket,
            'jumlah'    => $jumlah,
            'id_admin'  => $id_admin
        ];

        $where = [
            'id_uangmasuk' => $id
        ];

        $this->keuangan_model->editDataKeuangan($where, $data, 'keuangan_masuk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pemasukkan berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/keuangan/uangmasuk');
    }

    public function delete_um($id)
    {
        $where = ['id_uangmasuk' => $id];
        $this->keuangan_model->deleteDataKeuangan($where, 'keuangan_masuk');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Pemasukkan berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/keuangan/uangmasuk');
    }

    public function uangkeluar()
    {
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $data->username];
        $data['keuangan_keluar'] = $this->keuangan_model->getDataKeuanganKeluar()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/uangkeluar', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_uk()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $datau->username];
        $datab = [
            'tgl'       => set_value('tgl'),
            'ket'       => set_value('ket'),
            'jumlah'    => set_value('jumlah'),
            'id_admin'  => set_value('id_admin')
        ];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/uangkeluar_form', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_uangkeluar()
    {
        $this->_rules_uk();

        if ($this->form_validation->run() == false) {
            $this->add_uk();
        } else {
            $data = [
                'tgl'       => $this->input->post('tgl', true),
                'ket'       => $this->input->post('ket', true),
                'jumlah'    => $this->input->post('jumlah', true),
                'id_admin'  => $this->input->post('id_admin', true)
            ];

            $this->keuangan_model->addDataUangkeluar($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pengeluaran berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/keuangan/uangkeluar');
        }
    }

    public function _rules_uk()
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('ket', 'ket', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
    }

    public function edit_uk($id)
    {
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $data->username];
        $where = ['id_uangkeluar' => $id];
        $data['keuangan_keluar'] = $this->keuangan_model->editKeuangan($where, 'keuangan_keluar')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/uangkeluar_edit', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_uangkeluar()
    {
        $id         = $this->input->post('id_uangkeluar');
        $tgl        = $this->input->post('tgl');
        $ket        = $this->input->post('ket');
        $jumlah     = $this->input->post('jumlah');
        $id_admin   = $this->input->post('id_admin');

        $data = [
            'tgl'       => $tgl,
            'ket'       => $ket,
            'jumlah'    => $jumlah,
            'id_admin'  => $id_admin
        ];

        $where = [
            'id_uangkeluar' => $id
        ];

        $this->keuangan_model->editDataKeuangan($where, $data, 'keuangan_keluar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pengeluaran berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/keuangan/uangkeluar');
    }

    public function delete_uk($id)
    {
        $where = ['id_uangkeluar' => $id];
        $this->keuangan_model->deleteDataKeuangan($where, 'keuangan_keluar');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Pengeluaran berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/keuangan/uangkeluar');
    }
    
}