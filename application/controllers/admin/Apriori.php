<?php defined('BASEPATH') or exit('No direct script access allowed');

class Apriori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/apriori_m');
    }

    public function index()
    {
        if (get_last_apriori()->num_rows() > 0) {
            $this->session->set_flashdata('warning', 'Silahkan selesaikan Proses Apriori yang berjalan sebelumnya!');
            redirect('admin/apriori/proses');
        } else {
            $this->template->load('admin/template', 'admin/apriori/index');
        }
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['cari'])) {
            $query = $this->apriori_m->data_load_by_date($post['date_first'], $post['date_last']);
            if ($query->num_rows() > 0) {
                $data = [
                    'row' => $query,
                    'input' => $post
                ];
                $this->session->set_flashdata('Date_first', $post['date_first']);
                $this->session->set_flashdata('Date_last', $post['date_last']);
                $this->session->set_flashdata('P_kriteria', $post['p_kriteria']);
                $this->template->load('admin/template', 'admin/apriori/index', $data);
            } else {
                $this->session->set_flashdata('warning', 'Dataset Tidak Tersedia!<br> Coba untuk mengganti tanggal');
                $this->session->set_flashdata('Date_first', $post['date_first']);
                $this->session->set_flashdata('Date_last', $post['date_last']);
                $this->session->set_flashdata('P_kriteria', $post['p_kriteria']);
                $this->session->set_flashdata('P_support', $post['p_support']);
                $this->session->set_flashdata('P_confident', $post['p_confident']);
                redirect('admin/apriori');
            }
        } else if (isset($post['proses'])) {
            $this->apriori_m->insert_proses_log($post);

            $paused = get_last_apriori()->row();
            $post['id'] = $paused->id_proses;

            $query = $this->apriori_m->data_load_by_date($post['d_first'], $post['d_last']);
            insert_itemset_all($query, $post['id'], 1);

            $data = [
                'row' => $query,
                'input' => $post
            ];
            $this->template->load('admin/template', 'admin/apriori/hasil', $data);
        } else if (get_last_apriori()->num_rows() > 0) {
            $paused = get_last_apriori()->row();
            $post = [
                'd_first' => $paused->date_first,
                'd_last' => $paused->date_last,
                'p_support' => $paused->min_support,
                'p_confident' => $paused->min_confident,
                'id' => $paused->id_proses,
            ];
            $query = $this->apriori_m->data_load_by_date($post['d_first'], $post['d_last']);
            $data = [
                'row' => $query,
                'input' => $post
            ];
            $this->template->load('admin/template', 'admin/apriori/hasil', $data);
        } else {
            redirect('admin/apriori');
        }
    }

    function reset_proses($id)
    {
        $this->apriori_m->reset_proses($id);
        $this->apriori_m->reset_itemset($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Proses Apriori Berhasil di Reset!');
            redirect('admin/apriori');
        } else {
            $this->session->set_flashdata('error', 'Proses Apriori Gagal di Reset!');
            redirect('admin/apriori');
        }
    }
}
