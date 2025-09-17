<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model("Pemesanan_model");
		$this->load->model("Kereta_model");
		$this->load->model("User_model");
		$this->load->model("Tiket_model");
		$this->load->library('session');
		$this->load->model('Gerbong_model');
	}

	public function index() {
		$data["items"] = $this->Pemesanan_model->getAll();
		$this->load->view("pemesanan/index", $data);
	}

	public function add() {
		if ($this->input->post()) {
			$penumpang_list = $this->input->post('penumpang');
			$id_user = $this->session->userdata('id_user');

			// Validasi user login
			if (!$id_user) {
				show_error("User belum login atau tidak ditemukan.", 401);
			}

			// Validasi data penumpang
			if (empty($penumpang_list) || !is_array($penumpang_list)) {
				show_error("Data penumpang belum diisi.", 400);
			}

			$id_penumpang_utama = null;
			$id_penumpang_list   = [];

			$firstKey = array_key_first($penumpang_list);

			// Simpan semua penumpang
			foreach ($penumpang_list as $index => $p) {
				$p['id_user'] = $id_user;
				$id_penumpang = $this->Pemesanan_model->insertPenumpang($p);

				if ($index === $firstKey) {
					$id_penumpang_utama = $id_penumpang;
				}

				$id_penumpang_list[] = $id_penumpang;
			}

			// Ambil data inputan
			$id_gerbong   = $this->input->post('id_gerbong');
			$id_tiket     = $this->input->post('id_tiket');
			$total_harga  = $this->input->post('total_harga');

			// Buat kode_tiket otomatis
			$kode_tiket = 'TK-' . date('YmdHi') .  '-' . $id_gerbong;

			// Siapkan data pemesanan
			$data_pemesanan = [
				'id_gerbong'    => $id_gerbong,
				'id_tiket'      => $id_tiket,
				'id_penumpang'  => $id_penumpang_utama,
				'jml_penumpang' => count($id_penumpang_list),
				'total_harga'   => $total_harga,
				'status'        => 'pending',
				'kode_tiket'    => $kode_tiket
			];
			

			// Simpan pemesanan
			$id_pemesanan = $this->Pemesanan_model->insert($data_pemesanan);

			// Redirect ke transaksi
			redirect('pemesanan/transaksi/'.$id_pemesanan);
		}

		// Data untuk form
		$data['asal']   = $this->Kereta_model->getAsal();
		$data['tujuan'] = $this->Kereta_model->getTujuan();
		$data['tiket']  = $this->Kereta_model->getAllWithHarga(); 
		$data['id_tiket'] = $this->input->get('id_tiket');
		$data['gerbong']= $this->Gerbong_model->getAll();

		$this->load->view('pemesanan/add', $data);
	}

	public function transaksi($id_pemesanan) {
		$data['pemesanan'] = $this->Pemesanan_model->getDetail($id_pemesanan);
		$this->load->view('pemesanan/transaksi', $data);
	}

	public function bayar() {
		$id_pemesanan = $this->input->post('id_pemesanan');
		$metode = $this->input->post('metode');

		// Generate kode tiket pas bayar
		$kode_tiket = 'TK-' . date('YmdHis') . '-' . strtoupper(substr($metode,0,3));

		$this->db->where('id_pemesanan', $id_pemesanan)->update('pemesanan', [
			'status'            => 'lunas',
			'metode_pembayaran' => $metode,
			'kode_tiket'        => $kode_tiket
		]);

		// Redirect ke tiket
		redirect('pemesanan/tiket/'.$id_pemesanan);
	}

	public function tiket($id_pemesanan) {
		$data['pemesanan'] = $this->Pemesanan_model->getDetail($id_pemesanan);
		$this->load->view('pemesanan/tiket', $data);
	}

	public function edit($id) {
		if ($this->input->post()) {
			$data = [
				"id_tiket"      => $this->input->post("id_tiket"),
				"id_penumpang"  => $this->input->post("id_penumpang"),
				"id_gerbong"    => $this->input->post("id_gerbong"),
				"jml_penumpang" => $this->input->post("jml_penumpang"),
				"total_harga"   => $this->input->post("total_harga"),
				"status"        => $this->input->post("status")
			];
			$this->Pemesanan_model->update($id, $data);
			redirect("pemesanan");
		}

		$data["item"] = $this->Pemesanan_model->getById($id);
		$this->load->view("pemesanan/edit", $data);
	}

	public function delete($id) {
		$this->Pemesanan_model->delete($id);
		redirect("pemesanan");
	}
}
