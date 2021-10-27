<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/proses_m');
    }

    public function index()
    {
        if (@$_GET['date_first'] != null && @$_GET['date_last'] != null) {
            $query = $this->proses_m->data_load_by_date($_GET['date_first'], $_GET['date_last']);
            if ($query->num_rows() > 0) {
                $data['row'] = $query;
                $this->template->load('admin/template', 'admin/proses/index', $data);
            } else {
                $this->session->set_flashdata('warning', 'Dataset Tidak Tersedia!<br> Coba untuk mengganti tanggal');
                $this->session->set_flashdata('Date_first', $_GET['date_first']);
                $this->session->set_flashdata('Date_last', $_GET['date_last']);
                redirect('admin/proses');
            }
        } else {
            $this->template->load('admin/template', 'admin/proses/index');
        }
    }

    public function hasil()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post[''])) {
        } else {
            redirect('admin/proses');
        }
    }
}
