<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model("Pemesanan_model");
		$this->load->helper(['url', 'form']);
		$this->load->library('session');
		// Cek login kalau perlu
		// if(!$this->session->userdata('id_user')) redirect('auth/login');
	}

	public function index() {
		// Ambil filter dari GET
		$start=$this->input->get('start_date');
		$end=$this->input->get('end_date');
		$status=$this->input->get('status');

		$filters=[];
		if ($start) $filters['start_date']=$start;
		if ($end) $filters['end_date']=$end;
		if ($status) $filters['status']=$status;

		$data['title']="Laporan Pemesanan";
		$data['items']=$this->Pemesanan_model->getLaporan($filters);
		$data['filters']=$filters;

		$this->load->view('laporan/index', $data);
	}

	public function detail($id) {
		$data['item']=$this->Pemesanan_model->getDetail($id);
		$this->load->view('laporan/detail', $data);
	}

	public function export_pdf() {
		$filters=[ 'start_date'=>$this->input->get('start_date'),
		'end_date'=>$this->input->get('end_date'),
		'status'=>$this->input->get('status')];
		$data['items']=$this->Pemesanan_model->getLaporan($filters);

		$this->load->library('pdf');
		$html=$this->load->view('laporan/pdf', $data, TRUE);
		$this->pdf->createPDF($html, 'laporan_pemesanan_'.date('Ymd_His').'.pdf', TRUE);
	}



	// Export CSV (lebih simpel dari Excel)
	public function export_excel() {
		$filters=[ 'start_date'=>$this->input->get('start_date'),
		'end_date'=>$this->input->get('end_date'),
		'status'=>$this->input->get('status')];
		$rows=$this->Pemesanan_model->getLaporan($filters);

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=laporan_pemesanan_'.date('Ymd_His').'.csv');
		$output=fopen('php://output', 'w');

		// Header kolom
		fputcsv($output, ['ID', 'Tanggal', 'Kode Tiket', 'Penumpang Utama', 'Jumlah Penumpang', 'Total Harga', 'Status', 'Metode Pembayaran']);

		foreach ($rows as $r) {
			fputcsv($output, [ $r->id_pemesanan,
				$r->tanggal_pemesanan,
				$r->kode_tiket,
				$r->nama_penumpang ?? '-',
				$r->jml_penumpang,
				$r->total_harga,
				$r->status,
				$r->metode_pembayaran]);
		}

		fclose($output);
		exit;
	}
}
