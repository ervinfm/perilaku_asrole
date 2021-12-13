<?php defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/riwayat_m');
    }

    public function index()
    {
        $data = [
            'row' => $this->riwayat_m->get_data(),
            'row2' => get_konsultasi_log_all(),
        ];
        $this->template->load('admin/template', 'admin/riwayat/index', $data);
    }

    public function detail($id)
    {
        $apriori = get_proses_log($id);
        $data = [
            'row' => $apriori,
        ];
        $this->template->load('admin/template', 'admin/hasil/detail', $data);
    }

    public function detail_mhs($id)
    {
        $apriori = get_konsultasi_hasil($id);
        $data = [
            'row' => $apriori->row(),
        ];
        $this->template->load('admin/template', 'admin/riwayat/detail', $data);
    }

    function cetak($id)
    {
        $this->load->library('pdf');

        $this->pdf->setPaper('legal', 'landscape');
        $this->pdf->filename = "Laporan Apriori.pdf";
        $apriori = get_proses_log($id);
        $data = [
            'row' => $apriori,
        ];
        $this->pdf->load_view('admin/hasil/cetak', $data);
    }
}
