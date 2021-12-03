<?php defined('BASEPATH') or exit('No direct script access allowed');

class Apriori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/apriori_m');
        $this->load->library('asrole');
    }

    public function index()
    {
        if (get_last_apriori()->num_rows() > 0) {
            $data = get_last_apriori();
            $this->session->set_flashdata('warning', 'Silahkan selesaikan Proses Apriori yang berjalan sebelumnya!');
            redirect('admin/apriori/hasil/' . $data->row()->id_proses);
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
            insert_user_log(uri_string());
            $post['id'] = random_string('numeric', 9);
            $this->apriori_m->insert_proses_log($post);

            proses_iterasi1($post);
            proses_iterasi2($post);
            proses_iterasi3($post);
            aturan_asosiasi_hasil($post['id']);
            analitik_hasil($post['id']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Proses Mining Berhasil!');
                redirect('admin/apriori/hasil/' . $post['id']);
            } else {
                $this->session->set_flashdata('error', 'Gagal Menjalankan Algoritma Apriori! <br> Periksa Kembali Dataset!');
                redirect('admin/apriori/');
            }
        } else {
            redirect('admin/apriori');
        }
    }

    public function hasil($id_proses)
    {
        insert_user_log(uri_string());
        $temp = get_proses_log($id_proses);
        $data = [
            'row' => $temp,
        ];
        $this->template->load('admin/template', 'admin/apriori/hasil', $data);
    }

    function simpan_proses($id)
    {
        $this->apriori_m->simpan_proses($id);
        if ($this->db->affected_rows() > 0) {
            insert_user_log(uri_string());
            $this->session->set_flashdata('succes', 'Proses Apriori Berhasil di Simpan!');
            redirect('admin/hasil');
        } else {
            $this->session->set_flashdata('error', 'Proses Apriori Gagal di Simpan!');
            redirect('admin/apriori/hasil/' . $id);
        }
    }

    function reset_proses($id)
    {
        $this->apriori_m->reset_itemset3($id);
        $this->apriori_m->reset_itemset2($id);
        $this->apriori_m->reset_itemset1($id);
        $this->apriori_m->reset_hasil($id);
        $this->apriori_m->reset_proses($id);
        if ($this->db->affected_rows() > 0) {
            insert_user_log(uri_string());
            $this->session->set_flashdata('succes', 'Proses Apriori Berhasil di Reset!');
            redirect('admin/apriori');
        } else {
            $this->session->set_flashdata('error', 'Proses Apriori Gagal di Reset!');
            redirect('admin/apriori');
        }
    }
}
