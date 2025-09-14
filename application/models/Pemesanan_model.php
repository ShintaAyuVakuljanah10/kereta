<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {
    private $table = "pemesanan";

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ["id_pemesanan" => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('pemesanan', $data);
        return $this->db->insert_id();
    }
    
    public function insertPenumpang($data) {
        $this->db->insert('penumpang', $data);
        return $this->db->insert_id();
    }    
    
    public function updatePenumpangPemesanan($id_pemesanan, $id_penumpang) {
        // Kalau kamu punya tabel relasi, insert di situ
        $this->db->insert('pemesanan_penumpang', [
            'id_pemesanan' => $id_pemesanan,
            'id_penumpang' => $id_penumpang
        ]);
    }    

    public function update($id, $data) {
        $this->db->where("id_pemesanan", $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ["id_pemesanan" => $id]);
    }
}
