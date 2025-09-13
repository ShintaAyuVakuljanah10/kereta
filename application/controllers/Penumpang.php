<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Penumpang_model");
    }

    public function index(){
        $data["items"] = $this->Penumpang_model->getAll();
        $this->load->view("penumpang/index", $data);
    }

    public function add(){
        if($this->input->post()){
            $data = [
                "id_user" => $this->input->post("id_user"),
                "nik" => $this->input->post("nik"),
                "nama" => $this->input->post("nama"),
                "no_hp" => $this->input->post("no_hp")
            ];
            $this->Penumpang_model->insert($data);
            redirect("penumpang");
        }
        $this->load->view("penumpang/add");
    }

    public function edit($id){
        if($this->input->post()){
            $data = [
                "id_user" => $this->input->post("id_user"),
                "nik" => $this->input->post("nik"),
                "nama" => $this->input->post("nama"),
                "no_hp" => $this->input->post("no_hp")
            ];
            $this->Penumpang_model->update($id, $data);
            redirect("penumpang");
        }
        $data["item"] = $this->Penumpang_model->getById($id);
        $this->load->view("penumpang/edit", $data);
    }

    public function delete($id){
        $this->Penumpang_model->delete($id);
        redirect("penumpang");
    }
}
