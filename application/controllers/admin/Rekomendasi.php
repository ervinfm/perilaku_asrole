<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/rekomendasi_m');
    }

    public function index()
    {
        if (@$_GET['lev'] == null || @$_GET['lev'] == 1) {
            $data = [
                'row' => $this->rekomendasi_m->load_rek_fakultas()
            ];
        } else {
            $data = [
                'row' => $this->rekomendasi_m->load_rek_individu()
            ];
        }
        $this->template->load('admin/template', 'admin/rekomendasi/index', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['fakultas'])) {
            $id = $post['id'];
            $isi = $post['isi'];
            $result = array();
            foreach ($id as $key => $val) {
                $result[] = array(
                    'id_rekomendasi' => $id[$key],
                    'isi_rekomendasi' => $isi[$key],
                );
            }
            $this->db->update_batch('tb_rekomendasi', $result, 'id_rekomendasi');
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Rekomendasi Fakultas Berhasil Diperbaharui!');
                redirect('admin/rekomendasi');
            } else {
                $this->session->set_flashdata('error', 'Rekomendasi Fakultas Gagal Diperbaharui!');
                redirect('admin/rekomendasi');
            }
        } else  if (isset($post['individu'])) {
            $id = $post['id'];
            $isi = $post['isi'];
            $result = array();
            foreach ($id as $key => $val) {
                $result[] = array(
                    'id_rekomendasi' => $id[$key],
                    'isi_rekomendasi' => $isi[$key],
                );
            }
            $this->db->update_batch('tb_rekomendasi', $result, 'id_rekomendasi');
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Rekomendasi Fakultas Berhasil Diperbaharui!');
                redirect('admin/rekomendasi?lev=2');
            } else {
                $this->session->set_flashdata('error', 'Rekomendasi Fakultas Gagal Diperbaharui!');
                redirect('admin/rekomendasi?lev=2');
            }
        } else {
            redirect('admin/rekomendasi');
        }
    }
}
