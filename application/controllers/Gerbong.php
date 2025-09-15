<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerbong extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Gerbong_model");
    }

    public function index(){
        $data["items"] = $this->Gerbong_model->getAll();
        $this->load->view("gerbong/index", $data);
    }

    public function add(){
        $data = [];
        if($this->input->post()){
            $data = [
                "id_kereta" => $this->input->post("id_kereta"),
                "kapasitas" => $this->input->post("kapasitas"),
                "no_gerbong" => $this->input->post("no_gerbong")
            ];
            $this->Gerbong_model->insert($data);
            redirect("gerbong");
        }
        $this->load->view("gerbong/add", $data);
    }

    public function edit($id){
        if($this->input->post()){
            $data = [
                "id_kereta" => $this->input->post("id_kereta"),
                "kapasitas" => $this->input->post("kapasitas"),
                "no_gerbong" => $this->input->post("no_gerbong")
            ];
            $this->Gerbong_model->update($id, $data);
            redirect("gerbong");
        }
        $data["item"] = $this->Gerbong_model->getById($id);
        $this->load->view("gerbong/edit", $data);
    }

    public function delete($id){
        $this->Gerbong_model->delete($id);
        redirect("gerbong");
    }
}
