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
            $questA = $questB =  $questC = $questD = null;
            for ($i = 1; $i <= 5; $i++) {
                if ($post['quesA' . $i] > 3) {
                    if ($questA == null) {
                        $questA = $questA . 'P' . $i;
                    } else {
                        $questA = $questA . ',P' . $i;
                    }
                }
                if ($post['quesB' . $i] > 3) {
                    if ($questB == null) {
                        $questB = $questB . 'P' . $i;
                    } else {
                        $questB = $questB . ',P' . $i;
                    }
                }
                if ($post['quesC' . $i] > 3) {
                    if ($questC == null) {
                        $questC = $questC . 'P' . $i;
                    } else {
                        $questC = $questC . ',P' . $i;
                    }
                }
                if ($post['quesD' . $i] > 3) {
                    if ($questD == null) {
                        $questD = $questD . 'P' . $i;
                    } else {
                        $questD = $questD . ',P' . $i;
                    }
                }
            }
            $post['params1'] = $questA;
            $post['params2'] = $questB;
            $post['params3'] = $questC;
            $post['params4'] = $questD;
            insert_dataset(null, date('Y-m-d'), profil()->nama_user, $questA, $questB, $questC, $questD, profil()->id_fakultas, profil()->id_prodi);
            $this->konsultasi_m->insert_konsultasi($post);
            if ($this->db->affected_rows() > 0) {
                $post['id_proses'] = random_string('numeric', 10);
                insert_log($post['id_proses'], $post['id'], 1, 25);
                konsul_iterasi1($post['id_proses']);
                konsul_iterasi2($post['id_proses']);
                konsul_iterasi3($post['id_proses']);
                konsul_asosiasi_hasil($post['id_proses']);
                update_status_proses($post['id_proses']);

                $this->session->set_flashdata('succes', 'Proses Konsultasi Berhasil');
                redirect('konsultasi/hasil/' . $post['id_proses']);
            } else {
                $this->session->set_flashdata('error', 'Pengisian Data Kuesioner Gagal!');
                redirect('konsultasi');
            }
        }
    }

    public function hasil($id)
    {
        $data['row'] = get_konsultasi_log($id)->row();
        $this->template->load('user/template', 'user/konsultasi/hasil', $data);
    }
}
