<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Tiket_model");
    }

    public function index(){
        $data["items"] = $this->Tiket_model->getAll();
        $this->load->view("tiket/index", $data);
    }

    public function add(){
        if($this->input->post()){
            $data = [
                "id_kereta" => $this->input->post("id_kereta"),
                "harga" => $this->input->post("harga"),
                "tanggal" => $this->input->post("tanggal")
            ];
            $this->Tiket_model->insert($data);
            redirect("tiket");
        }
        $this->load->view("tiket/add");
    }

    public function edit($id){
        if($this->input->post()){
            $data = [
                "id_kereta" => $this->input->post("id_kereta"),
                "harga" => $this->input->post("harga"),
                "tanggal" => $this->input->post("tanggal")
            ];
            $this->Tiket_model->update($id, $data);
            redirect("tiket");
        }
        $data["item"] = $this->Tiket_model->getById($id);
        $this->load->view("tiket/edit", $data);
    }

    public function delete($id){
        $this->Tiket_model->delete($id);
        redirect("tiket");
    }
}
