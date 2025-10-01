<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['username'] = $this->session->userdata('nama') ?? 'Guest';

        // ambil data real dari DB
        $data['total_tiket']     = $this->Dashboard_model->getTotalTiket();
        $data['total_user']      = $this->Dashboard_model->getTotalUser();
        $data['total_pemesanan'] = $this->Dashboard_model->getTotalPemesanan();
        $data['total_penumpang'] = $this->Dashboard_model->getTotalPenumpang();
        $data['total_kereta']    = $this->Dashboard_model->getTotalKereta();
        $data['total_gerbong']   = $this->Dashboard_model->getTotalGerbong();

        // tambahan: pemesanan berdasarkan status
        $data['pemesanan_pending'] = $this->Dashboard_model->getTotalPemesananByStatus('pending');
        $data['pemesanan_lunas']   = $this->Dashboard_model->getTotalPemesananByStatus('lunas');

        $this->load->view('dashboard/index', $data);
    }
}
