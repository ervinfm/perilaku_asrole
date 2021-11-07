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
            $pert = [
                'p1' => null,
                'p2' => null,
                'p3' => null,
                'p4' => null,
                'p5' => null,
                'p6' => null,
                'p7' => null,
                'p8' => null,
                'p9' => null,
                'datas_count' => null,
                'seleksi' => null,
            ];

            foreach ($query1->result() as $key => $iterasi) {

                if ($post['kriteria'] == 1) {
                    $data = explode(",", $iterasi->params1_dataset);
                } else  if ($post['kriteria'] == 2) {
                    $data = explode(",", $iterasi->params2_dataset);
                } else  if ($post['kriteria'] == 3) {
                    $data = explode(",", $iterasi->params3_dataset);
                } else  if ($post['kriteria'] == 4) {
                    $data = explode(",", $iterasi->params4_dataset);
                }

                foreach ($data as $ke => $val) {
                    if ($val == 'P1') {
                        $pert['p1'] = $pert['p1'] + 1;
                    } else if ($val == 'P2') {
                        $pert['p2'] = $pert['p2'] + 1;
                    } else if ($val == 'P3') {
                        $pert['p3'] = $pert['p3'] + 1;
                    } else if ($val == 'P4') {
                        $pert['p4'] = $pert['p4'] + 1;
                    } else if ($val == 'P5') {
                        $pert['p5'] = $pert['p5'] + 1;
                    } else if ($val == 'P6') {
                        $pert['p6'] = $pert['p6'] + 1;
                    } else if ($val == 'P7') {
                        $pert['p7'] = $pert['p7'] + 1;
                    } else if ($val == 'P8') {
                        $pert['p8'] = $pert['p8'] + 1;
                    } else if ($val == 'P9') {
                        $pert['p9'] = $pert['p9'] + 1;
                    }
                }
                $pert['datas_count'] = $pert['datas_count'] + 1;
            }
            for ($i = 1; $i < 10; $i++) {
                if ($pert['p' . $i] != null) {
                    $sup = ($pert['p' . $i] / $pert['datas_count']) * 100;
                    if ($pert['p' . $i] > $post['p_support']) {
                        $seleksi = 1;
                    } else {
                        $seleksi = 0;
                    }
                    insert_itemset1($post['id'], 'P' . $i, $pert['p' . $i], $sup, $seleksi);
                    echo "Berhasil";
                }
            }

            // $id, $atribut, $jumlah, $support, $lolos
            // insert_itemset1($query, $post['id']);

            $data = [
                'row' => $query1,
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
