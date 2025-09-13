<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Pemesanan_model");
    }

    public function index(){
        $data["items"] = $this->Pemesanan_model->getAll();
        $this->load->view("pemesanan/index", $data);
    }

    public function add(){
        if($this->input->post()){
            $data = [
                "id_tiket" => $this->input->post("id_tiket"),
                "id_penumpang" => $this->input->post("id_penumpang"),
                "id_gerbong" => $this->input->post("id_gerbong"),
                "jml_penumpang" => $this->input->post("jml_penumpang"),
                "total_harga" => $this->input->post("total_harga"),
                "status" => $this->input->post("status")
            ];
            $this->Pemesanan_model->insert($data);
            redirect("pemesanan");
        }
        $this->load->view("pemesanan/add");
    }

    public function edit($id){
        if($this->input->post()){
            $data = [
                "id_tiket" => $this->input->post("id_tiket"),
                "id_penumpang" => $this->input->post("id_penumpang"),
                "id_gerbong" => $this->input->post("id_gerbong"),
                "jml_penumpang" => $this->input->post("jml_penumpang"),
                "total_harga" => $this->input->post("total_harga"),
                "status" => $this->input->post("status")
            ];
            $this->Pemesanan_model->update($id, $data);
            redirect("pemesanan");
        }
        $data["item"] = $this->Pemesanan_model->getById($id);
        $this->load->view("pemesanan/edit", $data);
    }

    public function delete($id){
        $this->Pemesanan_model->delete($id);
        redirect("pemesanan");
    }
}
