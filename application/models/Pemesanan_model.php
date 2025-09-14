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

    public function getDetail($id) {
        $this->db->select('p.*, t.*, k.nama AS nama_kereta, g.no_gerbong, pen.nama');
        $this->db->from('pemesanan p');
        $this->db->join('tiket t', 'p.id_tiket = t.id_tiket', 'left');
        $this->db->join('kereta k', 't.id_kereta = k.id_kereta', 'left'); 
        $this->db->join('gerbong g', 'p.id_gerbong = g.id_gerbong', 'left');
        $this->db->join('penumpang pen', 'p.id_penumpang = pen.id_penumpang', 'left');
        $this->db->where('p.id_pemesanan', $id);
        return $this->db->get()->row();
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
         // Tidak digunakan karena tidak ada tabel relasi
    }    

    public function update($id, $data) {
        $this->db->where("id_pemesanan", $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ["id_pemesanan" => $id]);
    }
}
