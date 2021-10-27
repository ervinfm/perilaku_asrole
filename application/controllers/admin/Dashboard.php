<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        $this->template->load('admin/template', 'admin/dashboard');
    }
}
