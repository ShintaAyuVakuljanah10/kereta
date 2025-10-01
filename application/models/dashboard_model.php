<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getTotalTiket() {
        return $this->db->count_all('tiket');
    }

    public function getTotalUser() {
        return $this->db->count_all('user');
    }

    public function getTotalPemesanan() {
        return $this->db->count_all('pemesanan');
    }

    public function getTotalPenumpang() {
        return $this->db->count_all('penumpang');
    }

    public function getTotalKereta() {
        return $this->db->count_all('kereta');
    }

    public function getTotalGerbong() {
        return $this->db->count_all('gerbong');
    }

    // kalau mau statistik per status (pending/lunas)
    public function getTotalPemesananByStatus($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results('pemesanan');
    }
}
