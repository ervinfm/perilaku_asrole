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
        $last = get_last_konsul();
        $data['row'] = get_konsultasi_log($last->id_proses)->row();
        $this->template->load('user/template', 'user/hasil/index', $data);
    }
}
