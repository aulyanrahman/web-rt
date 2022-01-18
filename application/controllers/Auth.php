<?php

class Auth extends CI_Controller{

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $user = $this->input->post('username');
            $pass = md5($this->input->post('password'));

            $cek = $this->login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0){
                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'admin'){
                    redirect('admin/dashboard');
                } else if ($sess_data['level'] == 'warga'){
                    redirect('user/dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Maaf, password Anda salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Maaf, password Anda salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}