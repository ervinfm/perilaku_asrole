<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        if (get_last_apriori()->num_rows() > 0) {
            $data['row'] = get_last_apriori()->row();
            $this->session->set_flashdata('warning', 'Silahkan Simpan Hasil Proses Apriori pada <b> Association Rule Mining</b> terlebih dahulu!');
            $this->template->load('admin/template', 'admin/hasil/index', $data);
        } else {
            $apriori = get_last_apriori(1)->row();
            $data = [
                'row' => $apriori,
            ];
            $this->template->load('admin/template', 'admin/hasil/index', $data);
        }
    }
}
