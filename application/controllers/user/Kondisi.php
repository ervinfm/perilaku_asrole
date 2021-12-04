<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        if (@get_last_konsul()) {
            $last = get_last_konsul();
            $data['row'] = get_konsultasi_log($last->id_proses)->row();
            $this->template->load('user/template', 'user/kondisi/index', $data);
        } else {
            $this->session->set_flashdata('warning', 'Hasil Konsultasi belum ada, Silahkan Konsultasi terlebih dahulu!');
            redirect('konsultasi');
        }
    }
}
