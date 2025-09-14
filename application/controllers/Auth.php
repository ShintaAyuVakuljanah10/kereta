<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('session');
    }

    public function index(){
        redirect("auth/login");
    }

    public function login(){
        if ($this->input->post()) {
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $user = $this->User_model->getByUsername($username);

            if ($user && $user['password'] === $password) { 
                $this->session->set_userdata([
                    "id_user" => $user['id_user'],
                    "username" => $user['username'],
                    "role" => $user['role'],
                    "logged_in" => true
                ]);
                redirect("user"); 
            } else {
                $this->session->set_flashdata("error", "Username atau password salah!");
                redirect("auth/login");
            }
        }

        $this->load->view("auth/login");
    }

    public function register(){
        if ($this->input->post()) {
            $data = [
                "username" => $this->input->post("username"),
                "password" => $this->input->post("password"), // Gunakan password_hash jika perlu
                "role" => 'user', // default role
                "no_hp" => $this->input->post("no_hp")
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata("success", "Registrasi berhasil. Silakan login.");
            redirect("auth/login");
        }

        $this->load->view("auth/register");
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("auth/login");
    }
}
