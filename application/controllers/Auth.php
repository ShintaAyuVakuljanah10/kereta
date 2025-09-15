<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login(){
        // Jika form disubmit
        if($this->input->post()){
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $user = $this->User_model->getByUsername($username);

            // BANDingkan langsung (plain text). GANTI password_verify ke == 
            if($user && $password === $user->password){
                // set session
                $this->session->set_userdata([
                    'id_user'   => $user->id_user,
                    'username'  => $user->username,
                    'role'      => $user->role,
                    'no_hp'     => $user->no_hp,
                    'logged_in' => TRUE
                ]);

                // redirect berdasarkan role
                if($user->role == 'admin'){
                    redirect('user');
                } elseif($user->role == 'petugas'){
                    redirect('kereta');
                } else {
                    redirect('pemesanan');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
