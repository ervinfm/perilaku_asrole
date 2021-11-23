<?php defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('user/riwayat_m');
    }

    public function index()
    {
        $data['row'] = $this->riwayat_m->get_riwayat();
        $this->template->load('user/template', 'user/riwayat/index', $data);
    }

    public function detail($id)
    {
        $data['row'] = get_konsultasi_log($id)->row();
        $this->template->load('user/template', 'user/riwayat/detail', $data);
    }

    public function cetak($id)
    {
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Konsultasi.pdf";

        $data['row'] = get_konsultasi_log($id)->row();
        $this->pdf->load_view('user/riwayat/cetak', $data);
    }
}
