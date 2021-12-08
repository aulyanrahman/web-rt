<?php

class Users extends CI_Controller{

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
        $datab['user'] = $this->user_model->showDataUser('user')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/daftar_users', $datab);
        $this->load->view('templates_admin/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datau = ['username'  =>  $datau->username];
        $datab = [
            'username'  => set_value('username'),
            'password'  => set_value('password'),
            'email'     => set_value('email'),
            'level'     => set_value('level'),
        ];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/users_form', $datab);
        $this->load->view('templates_admin/footer');
    }

    public function add_users()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'username'      => $this->input->post('username', true),
                'password'      => md5($this->input->post('password', true)),
                'email'         => $this->input->post('email', true),
                'level'         => $this->input->post('level', true),
            ];

            $this->user_model->addDataUser($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/users');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datau = ['username'  =>  $datau->username];
        $where = ['id' => $id];
        $datab['user'] = $this->user_model->editUser($where, 'user')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $datau);
        $this->load->view('admin/users_edit', $datab);
        $this->load->view('templates_admin/footer');
    }

    public function edit_users()
    {
        $id         = $this->input->post('id');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $email      = $this->input->post('email');
        $level      = $this->input->post('level');

        $data = [
            'username'  => $username,
            'password'  => md5($password),
            'email'     => $email,
            'level'     => $level,
        ];

        $where = [
            'id' => $id
        ];

        $this->user_model->editDataUser($where, $data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/users');
    }

    public function delete($id)
    {
        $where = ['id' => $id];
        $this->user_model->deleteDataUser($where, 'user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Akun berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/users');
    }

}