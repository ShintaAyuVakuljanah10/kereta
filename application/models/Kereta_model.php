<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kereta_model extends CI_Model {
    private $table = "kereta";

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ["id_kereta" => $id])->row();
    }

    public function getAsal() {
        return $this->db->select('titik_awal')->distinct()->get('kereta')->result();
    }

    public function getTujuan() {
        return $this->db->select('titik_akhir')->distinct()->get('kereta')->result();
    }

    public function getAllWithHarga() {
        $this->db->select('tiket.id_tiket, tiket.id_kereta, tiket.harga, kereta.nama');
        $this->db->from('tiket');
        $this->db->join('kereta', 'kereta.id_kereta = tiket.id_kereta');
        return $this->db->get()->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where("id_kereta", $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ["id_kereta" => $id]);
    }
}
