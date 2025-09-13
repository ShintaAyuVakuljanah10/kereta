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
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where("id_pemesanan", $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ["id_pemesanan" => $id]);
    }
}
