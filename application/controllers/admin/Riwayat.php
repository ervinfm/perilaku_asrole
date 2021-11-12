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
        ];
        $this->template->load('admin/template', 'admin/riwayat/index', $data);
    }
}
