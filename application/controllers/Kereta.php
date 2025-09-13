<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kereta extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Kereta_model");
    }

    public function index(){
        $data["items"] = $this->Kereta_model->getAll();
        $this->load->view("kereta/index", $data);
    }

    public function add(){
        if($this->input->post()){
            $data = [
                "nama" => $this->input->post("nama"),
                "jam_keberangkatan" => $this->input->post("jam_keberangkatan"),
                "jam_tiba" => $this->input->post("jam_tiba"),
                "titik_awal" => $this->input->post("titik_awal"),
                "titik_akhir" => $this->input->post("titik_akhir")
            ];
            $this->Kereta_model->insert($data);
            redirect("kereta");
        }
        $this->load->view("kereta/add");
    }

    public function edit($id){
        if($this->input->post()){
            $data = [
                "nama" => $this->input->post("nama"),
                "jam_keberangkatan" => $this->input->post("jam_keberangkatan"),
                "jam_tiba" => $this->input->post("jam_tiba"),
                "titik_awal" => $this->input->post("titik_awal"),
                "titik_akhir" => $this->input->post("titik_akhir")
            ];
            $this->Kereta_model->update($id, $data);
            redirect("kereta");
        }
        $data["item"] = $this->Kereta_model->getById($id);
        $this->load->view("kereta/edit", $data);
    }

    public function delete($id){
        $this->Kereta_model->delete($id);
        redirect("kereta");
    }
}
