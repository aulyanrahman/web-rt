<?php

class Register extends CI_Controller{

    public function index()
    {
        $this->load->view('register');
    }

    public function add()
    {
        $data = [
            'username'  => set_value('username'),
            'password'  => set_value('password'),
            'email'     => set_value('email'),
            'level'     => set_value('level'),
        ];
        $this->load->view('register', $data);
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
                    Silahkan Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
    }

}