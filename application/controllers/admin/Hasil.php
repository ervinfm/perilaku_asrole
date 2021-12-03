<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->library('pdf');
    }

    public function index()
    {
        if (get_last_apriori()->num_rows() > 0) {
            $data['row'] = get_last_apriori()->row();
            $this->session->set_flashdata('warning', 'Silahkan Simpan Hasil Proses Apriori pada <b> Association Rule Mining</b> terlebih dahulu!');
            $this->template->load('admin/template', 'admin/hasil/index', $data);
        } else {
            if (get_last_apriori(1)->num_rows() > 0) {
                $apriori = get_last_apriori(1)->row();
                $data = [
                    'row' => $apriori,
                ];
                $this->template->load('admin/template', 'admin/hasil/index', $data);
            } else {
                $this->session->set_flashdata('warning', 'Belum Ada Poses Mining Apriori Sebelumnya!<br>Silahkan Lakukan Proses Apriori Terlebih Dahulu!');
                redirect('admin/apriori');
            }
        }
    }

    public function detail($id)
    {
        $apriori = get_proses_log($id);
        $data = [
            'row' => $apriori,
        ];
        $this->template->load('admin/template', 'admin/hasil/detail', $data);
    }

    function cetak($id)
    {
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Laporan Apriori.pdf";
        $apriori = get_proses_log($id);
        $data = [
            'row' => $apriori,
        ];
        $this->pdf->load_view('admin/hasil/cetak', $data);
        $this->load->view('admin/hasil/cetak', $data);
    }
}
