<?php defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        $this->template->load('user/template', 'user/konsultasi/index');
    }
}
