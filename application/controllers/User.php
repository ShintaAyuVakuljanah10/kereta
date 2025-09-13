<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("User_model");
    }

    public function index(){
        $data["items"] = $this->User_model->getAll();
        $this->load->view("user/index", $data);
    }

    public function add(){
        if($this->input->post()){
            $data = [
                "username" => $this->input->post("username"),
                "password" => $this->input->post("password"),
                "role" => $this->input->post("role"),
                "no_hp" => $this->input->post("no_hp")
            ];
            $this->User_model->insert($data);
            redirect("user");
        }
        $this->load->view("user/add");
    }

    public function edit($id){
        if($this->input->post()){
            $data = [
                "username" => $this->input->post("username"),
                "password" => $this->input->post("password"),
                "role" => $this->input->post("role"),
                "no_hp" => $this->input->post("no_hp")
            ];
            $this->User_model->update($id, $data);
            redirect("user");
        }
        $data["item"] = $this->User_model->getById($id);
        $this->load->view("user/edit", $data);
    }

    public function delete($id){
        $this->User_model->delete($id);
        redirect("user");
    }
}
