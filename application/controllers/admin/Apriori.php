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
            $post['id'] = random_string('numeric', 9);
            $this->apriori_m->insert_proses_log($post);
            $query1 = $this->apriori_m->data_load_by_date($post['d_first'], $post['d_last']);
            proses_iterasi1($query1, $post);
            if (cek_itemset($post['id'], 1)->num_rows() > 0) {
                proses_iterasi2($query1, $post);
                if (cek_itemset($post['id'], 2)->num_rows() > 0) {
                    proses_iterasi3($post);
                    $data = [
                        'row' => $query1,
                        'input' => $post
                    ];
                    $this->template->load('admin/template', 'admin/apriori/hasil', $data);
                } else {
                    $this->session->set_flashdata('success', 'Proses Mining Berhenti! <br> Berhenti di Iterasi 2');
                    redirect('admin/apriori/proses');
                }
            } else {
                $this->session->set_flashdata('warning', 'Gagal Menjalankan Algoritma Apriori! <br> Berhenti di Iterasi 1');
                redirect('admin/apriori/proses');
            }
        } else if (get_last_apriori()->num_rows() > 0) {
            $paused = get_last_apriori()->row();
            $post = [
                'd_first' => $paused->date_first,
                'd_last' => $paused->date_last,
                'p_support' => $paused->min_support,
                'p_confident' => $paused->min_confident,
                'id' => $paused->id_proses,
            ];
            $data = [
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
        $this->apriori_m->reset_itemset3($id);
        $this->apriori_m->reset_itemset2($id);
        $this->apriori_m->reset_itemset1($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Proses Apriori Berhasil di Reset!');
            redirect('admin/apriori');
        } else {
            $this->session->set_flashdata('error', 'Proses Apriori Gagal di Reset!');
            redirect('admin/apriori');
        }
    }
}
