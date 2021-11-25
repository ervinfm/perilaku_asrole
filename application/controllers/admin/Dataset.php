<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dataset extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/dataset_m');
        $this->load->library('excel');
    }

    public function index()
    {
        $data = [
            'row' => $this->dataset_m->data_load()
        ];
        $this->template->load('admin/template', 'admin/dataset/index', $data);
    }

    public function insert()
    {
        if (@$_GET['n'] > 25) {
            $this->session->set_flashdata('error', 'Jumlah Data Baru terlalu banyak! <br> Pastikan tidak Melebihi 25 Data! ');
            redirect('admin/dataset/insert?n=25');
        } else {
            $this->template->load('admin/template', 'admin/dataset/form');
        }
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            if (count($_POST['d_param1']) > 25) {
                $itemset = get_last_itemset()->itemset_dataset + 1;
            } else {
                $itemset = get_last_itemset()->itemset_dataset;
            }

            $date = date('Y-m-d');
            $subjek = $_POST['d_subjek'];
            $params1 = $_POST['d_param1'];
            $params2 = $_POST['d_param2'];
            $params3 = $_POST['d_param3'];
            $params4 = $_POST['d_param4'];
            $author = profil()->id_user;

            if ($params1[0] != null || $params2[0] != null || $params3[0] != null || $params4[0] != null) {
                $data = array();
                $index = 0;
                foreach ($params1 as $dataval) {
                    array_push($data, array(
                        'itemset_dataset' => $itemset,
                        'datetime_dataset' => $date,
                        'subyek_dataset' => ($subjek[$index] == NULL ? random_string('alnum', 5) : $subjek[$index]),
                        'params1_dataset' => $dataval,
                        'params2_dataset' => $params2[$index],
                        'params3_dataset' => $params3[$index],
                        'params4_dataset' => $params4[$index],
                        'author_dataset' => $author,
                    ));
                    $index++;
                }
                $sql = $this->dataset_m->insert_batch($data);
                if ($sql) {
                    insert_user_log(uri_string());
                    $this->session->set_flashdata('succes', 'Dataset Berhasil di Tambahkan!');
                    redirect('admin/dataset');
                } else {
                    $this->session->set_flashdata('error', 'Dataset Gagal di Tambahkan!');
                    redirect('admin/dataset/insert?n=' . $index);
                }
            } else {
                $this->session->set_flashdata('error', 'Dataset Gagal di Tambahkan!<br> Pastikan data diisi dengan Benar!');
                redirect('admin/dataset/insert?n=' . count($params1));
            }
        } else if (isset($post['delete'])) {
            $data = $post['id'];
            if (count($data) > 0) {
                $this->dataset_m->delete_selected($data);
                if ($this->db->affected_rows() > 0) {
                    insert_user_log(uri_string());
                    $this->session->set_flashdata('succes', 'Dataset Berhasil di Hapus!');
                    redirect('admin/dataset');
                } else {
                    $this->session->set_flashdata('error', 'Dataset Gagal di Hapus!');
                    redirect('admin/dataset');
                }
            } else {
                $this->session->set_flashdata('error', 'Tidak ada data yang dipilih!');
                redirect('admin/dataset');
            }
        } else {
            redirect('admin/dataset');
        }
    }

    function reset_dataset()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['reset'])) {
            if (sha1($post['r_pass']) == profil()->password_user) {
                $this->dataset_m->reset_dataset();
                if ($this->db->affected_rows() > 0) {
                    insert_user_log(uri_string());
                    $this->session->set_flashdata('succes', 'Dataset Berhasil di Reset!');
                    redirect('admin/dataset');
                } else {
                    $this->session->set_flashdata('error', 'Dataset Gagal di Reset!');
                    redirect('admin/dataset');
                }
            } else {
                $this->session->set_flashdata('error', 'Password Akun Salah, Dataset Batal untuk direset!');
                redirect('admin/dataset');
            }
        } else {
            redirect('admin/dataset');
        }
    }

    public function upload()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['upload'])) {
            if (isset($_FILES["dataset"]["name"])) {
                $path = $_FILES["dataset"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                $itemset =  get_last_itemset()->itemset_dataset + 1;
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for ($row = 2; $row <= $highestRow; $row++) {
                        // Tanggal Menyesuaikan format SQL
                        $date_tmp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $date =  konversi_tanggal_timestamp($date_tmp);

                        $subyek = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $prodi = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                        $temp1 = $temp2 = $temp3 = $temp4 = null;
                        // Untuk Kriteria 1 Religiusitas (kolom 22-30)
                        for ($a = 22; $a <= 30; $a++) {
                            if ($a == 22) {
                                $temp1 = $worksheet->getCellByColumnAndRow($a, $row)->getValue();
                            } else {
                                $temp1 =  $temp1 . ',' . $worksheet->getCellByColumnAndRow($a, $row)->getValue();
                            }
                        }

                        // Untuk Kriteria 2 Kehidupan Sosial Dan Keluarga (kolom 15-21)
                        for ($b = 15; $b <= 21; $b++) {
                            if ($b == 15) {
                                $temp2 = $worksheet->getCellByColumnAndRow($b, $row)->getValue();
                            } else {
                                $temp2 =  $temp2 . ',' . $worksheet->getCellByColumnAndRow($b, $row)->getValue();
                            }
                        }

                        // Untuk Kriteria 3 Masalah Akademik (kolom 54-57)
                        for ($c = 54; $c <= 57; $c++) {
                            if ($c == 54) {
                                $temp3 = $worksheet->getCellByColumnAndRow($c, $row)->getValue();
                            } else {
                                $temp3 =  $temp3 . ',' . $worksheet->getCellByColumnAndRow($c, $row)->getValue();
                            }
                        }

                        // Untuk Kriteria 4 Masalah Keluarga (kolom 63-67)
                        for ($d = 63; $d <= 67; $d++) {
                            if ($d == 54) {
                                $temp4 = $worksheet->getCellByColumnAndRow($d, $row)->getValue();
                            } else {
                                $temp4 =  $temp4 . ',' . $worksheet->getCellByColumnAndRow($d, $row)->getValue();
                            }
                        }

                        $params1 = $temp1;
                        $params2 = $temp2;
                        $params3 = $temp3;
                        $params4 = $temp4;
                        $fakultas = get_fakultas_by_nameprodi($prodi)->id_fakultas;
                        $temp_data[] = array(
                            'datetime_dataset'  => $date,
                            'subyek_dataset'    => $subyek,
                            'params1_dataset'   => $params1,
                            'params2_dataset'   => $params2,
                            'params3_dataset'   => $params3,
                            'params4_dataset'   => $params4,
                            'author_dataset'    => $this->session->userdata('user_id'),
                            'id_fakultas' => $fakultas,
                        );
                    }
                }
                $this->dataset_m->upload($temp_data);
                if ($this->db->affected_rows() > 0) {
                    insert_user_log(uri_string());
                    $this->session->set_flashdata('succes', 'Dataset Berhasil di Unggah!, Silahkan Pilih Next untuk Melanjutkan');
                    redirect('admin/dataset/upload');
                } else {
                    $this->session->set_flashdata('error', 'Dataset Gagal di Unggah, Pastikan Sesuai dengan Format!');
                    redirect('admin/dataset/upload');
                }
            } else {
                $this->session->set_flashdata('error', 'Dataset Gagal di Unggah, Pastikan Sesuai dengan Format!');
                redirect('admin/dataset/upload');
            }
        } else {
            $data = [
                'transit' => $this->dataset_m->load_transit()
            ];
            $this->template->load('admin/template', 'admin/dataset/index', $data);
        }
    }

    function reset_transit()
    {
        $this->dataset_m->reset_transit();
        if ($this->db->affected_rows() > 0) {
            insert_user_log(uri_string());
            $this->session->set_flashdata('succes', 'Dataset Baru Berhasil di Reset!');
            redirect('admin/dataset/upload');
        } else {
            $this->session->set_flashdata('error', 'Dataset Baru Gagal di Reset!');
            redirect('admin/dataset/upload');
        }
    }

    function cleaning()
    {
        $data = $this->dataset_m->load_transit();
        foreach ($data->result() as $key => $dataset) {
            if ($dataset->params1_dataset == NULL || $dataset->params2_dataset == NULL || $dataset->params3_dataset == NULL || $dataset->params4_dataset == NULL) {
                $this->dataset_m->cleaning_data($dataset->id_dataset);
            }
        }
        if ($this->db->affected_rows() > 0) {
            insert_user_log(uri_string());
            $this->session->set_flashdata('succes', 'Dataset Baru Berhasil di Cleaning!');
            redirect('admin/dataset/upload?action=cleaning');
        } else {
            $this->session->set_flashdata('error', 'Dataset Baru Gagal di Cleaning!');
            redirect('admin/dataset/upload?action=cleaning');
        }
    }

    function reduction()
    {
        $data = $this->dataset_m->load_transit();
        foreach ($data->result() as $key => $dataset) {
            $datas = [
                'id' => $dataset->id_dataset,
                'par1' => transfor_data($dataset->params1_dataset),
                'par2' => transfor_data($dataset->params2_dataset),
                'par3' => transfor_data($dataset->params3_dataset),
                'par4' => transfor_data($dataset->params4_dataset),
            ];
            $this->dataset_m->update_dataset_transit($datas);
        }
        if ($this->db->affected_rows() > 0) {
            $data = $this->dataset_m->load_transit();
            foreach ($data->result() as $key => $dataset) {
                if ($dataset->params1_dataset == NULL || $dataset->params2_dataset == NULL || $dataset->params3_dataset == NULL || $dataset->params4_dataset == NULL) {
                    $this->dataset_m->cleaning_data($dataset->id_dataset);
                }
            }
            if ($this->db->affected_rows() > 0) {
                insert_user_log(uri_string());
                $this->session->set_flashdata('succes', 'Dataset Baru Berhasil di Reduction!');
                redirect('admin/dataset/upload?action=reduction');
            } else {
                $this->session->set_flashdata('error', 'Preprocessing Gagal, Silahkan Coba Kembali!');
                redirect('admin/dataset/upload?action=transformation');
            }
        } else {
            $this->session->set_flashdata('error', 'Preprocessing Gagal, Silahkan Coba Kembali!');
            redirect('admin/dataset/upload?action=transformation');
        }
    }

    public function submit()
    {
        $data = $this->dataset_m->load_transit();
        $itemset_dataset = get_last_itemset()->itemset_dataset + 1;
        foreach ($data->result() as $key => $dataset) {
            $temp_data = [
                'itemset_dataset'   => $itemset_dataset,
                'datetime_dataset'  => $dataset->datetime_dataset,
                'subyek_dataset'    => $dataset->subyek_dataset,
                'params1_dataset'   => $dataset->params1_dataset,
                'params2_dataset'   => $dataset->params2_dataset,
                'params3_dataset'   => $dataset->params3_dataset,
                'params4_dataset'   => $dataset->params4_dataset,
                'author_dataset'    => profil()->id_user,
                'id_fakultas'       => $dataset->id_fakultas,
            ];
            $this->dataset_m->submit($temp_data);
        }
        if ($this->db->affected_rows() > 0) {
            insert_user_log(uri_string());
            $this->dataset_m->reset_transit();
            $this->session->set_flashdata('succes', 'Dataset Berhasil di simpan pada Basis Data!');
            redirect('admin/dataset');
        } else {
            $this->session->set_flashdata('error', 'Dataset Gagal di simpan pada Basis Data!');
            redirect('admin/dataset');
        }
    }
}
