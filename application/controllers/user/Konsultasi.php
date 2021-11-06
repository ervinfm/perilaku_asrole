<?php defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('user/konsultasi_m');
    }

    public function index()
    {
        $this->template->load('user/template', 'user/konsultasi/index');
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['quesioner'])) {
            if ($post['quesA1'] || $post['quesA2'] || $post['quesA3'] || $post['quesA4'] || $post['quesA5'] || $post['quesA6'] || $post['quesA7'] || $post['quesA8'] || $post['quesA9']) {
                $questA = $post['quesA1'];
                for ($i = 2; $i <= 9; $i++) {
                    $questA = $questA . ',' . $post['quesA' . $i];
                }
                $post['params1'] = $questA;
            }
            if ($post['quesB1'] || $post['quesB2'] || $post['quesB3'] || $post['quesB4'] || $post['quesB5'] || $post['quesB6'] || $post['quesB7']) {
                $questB = $post['quesB1'];
                for ($i = 2; $i <= 7; $i++) {
                    $questB = $questB . ',' . $post['quesB' . $i];
                }
                $post['params2'] = $questB;
            }
            if ($post['quesC1'] || $post['quesC2'] || $post['quesC3'] || $post['quesC4']) {
                $questC = $post['quesC1'];
                for ($i = 2; $i <= 4; $i++) {
                    $questC = $questC . ',' . $post['quesC' . $i];
                }
                $post['params3'] = $questC;
            }
            if ($post['quesD1'] || $post['quesD2'] || $post['quesD3'] || $post['quesD4'] || $post['quesD5']) {
                $questD = $post['quesD1'];
                for ($i = 2; $i <= 5; $i++) {
                    $questD = $questD . ',' . $post['quesD' . $i];
                }
                $post['params4'] = $questD;
            }
            $this->konsultasi_m->insert_konsultasi($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Dataset Berhasil!');
                redirect('konsultasi');
            } else {
                $this->session->set_flashdata('error', 'Dataset Gagal!');
                redirect('konsultasi');
            }
        }
    }
}
