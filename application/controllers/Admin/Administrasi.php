<?php

class Administrasi extends CI_Controller{

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
        $data['admin_warga'] = $this->administrasi_model->getDataAdministrasi()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/administrasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $datau->username];
        $data = [
            'nm_warga'      => set_value('nm_warga'),
            'nkk'           => set_value('nkk'),
            'nik'           => set_value('nik'),
            'tpt_lahir'     => set_value('tpt_lahir'),
            'tgl_lahir'     => set_value('tgl_lahir'),
            'jk'            => set_value('jk'),
            'gol_darah'     => set_value('gol_darah'),
            'alamat'        => set_value('alamat'),
            'agama'         => set_value('agama'),
            'status'        => set_value('status'),
            'pekerjaan'     => set_value('pekerjaan'),
            'warganegara'   => set_value('warganegara'),
            'telp'          => set_value('telp'),
            'email'         => set_value('email'),
            'id_user'       => set_value('id_user')
        ];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/administrasi_form', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_administrasi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'nm_warga'      => $this->input->post('nm_warga', true),
                'nkk'           => $this->input->post('nkk', true),
                'nik'           => $this->input->post('nik', true),
                'tpt_lahir'     => $this->input->post('tpt_lahir', true),
                'tgl_lahir'     => $this->input->post('tgl_lahir', true),
                'jk'            => $this->input->post('jk', true),
                'gol_darah'     => $this->input->post('gol_darah', true),
                'alamat'        => $this->input->post('alamat', true),
                'agama'         => $this->input->post('agama', true),
                'status'        => $this->input->post('status', true),
                'pekerjaan'     => $this->input->post('pekerjaan', true),
                'warganegara'   => $this->input->post('warganegara', true),
                'telp'          => $this->input->post('telp', true),
                'email'         => $this->input->post('email', true),
                'id_user'       => $this->input->post('id_user', true)
            ];

            $this->administrasi_model->addDataAdministrasi($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data warga berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/administrasi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_warga', 'nm_warga', 'required');
        $this->form_validation->set_rules('nkk', 'nkk', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('tpt_lahir', 'tpt_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('gol_darah', 'gol_darah', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        $this->form_validation->set_rules('warganegara', 'warganegara', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
    }

    public function edit($id)
    {
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = ['username'  =>  $data->username];
        $where = ['id_warga' => $id];
        $data['admin_warga'] = $this->administrasi_model->editAdministrasi($where, 'admin_warga')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/administrasi_edit', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_administrasi()
    {
        $id            = $this->input->post('id_warga');
        $nm_warga      = $this->input->post('nm_warga');
        $nkk           = $this->input->post('nkk');
        $nik           = $this->input->post('nik');
        $tpt_lahir     = $this->input->post('tpt_lahir');
        $tgl_lahir     = $this->input->post('tgl_lahir');
        $jk            = $this->input->post('jk');
        $gol_darah     = $this->input->post('gol_darah');
        $alamat        = $this->input->post('alamat');
        $agama         = $this->input->post('agama');
        $status        = $this->input->post('status');
        $pekerjaan     = $this->input->post('pekerjaan');
        $warganegara   = $this->input->post('warganegara');
        $telp          = $this->input->post('telp');
        $email         = $this->input->post('email');
        $id_user       = $this->input->post('id_user');

        $data = [
            'nm_warga'      => $nm_warga,
            'nkk'           => $nkk,
            'nik'           => $nik,
            'tpt_lahir'     => $tpt_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'jk'            => $jk,
            'gol_darah'     => $gol_darah,
            'alamat'        => $alamat,
            'agama'         => $agama,
            'status'        => $status,
            'pekerjaan'     => $pekerjaan,
            'warganegara'   => $warganegara,
            'telp'          => $telp,
            'email'         => $email,
            'id_user'       => $id_user
        ];

        $where = [
            'id_warga' => $id
        ];

        $this->administrasi_model->editDataAdministrasi($where, $data, 'admin_warga');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data warga berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/administrasi');
    }

    public function delete($id)
    {
        $where = ['id_warga' => $id];
        $this->administrasi_model->deleteDataAdministrasi($where, 'admin_warga');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data warga berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/administrasi');
    }

}