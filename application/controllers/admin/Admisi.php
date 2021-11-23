<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admisi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/admisi_m');
    }

    public function index()
    {
        $data['fakultas'] = $this->admisi_m->load_fakultas();
        $this->template->load('admin/template', 'admin/admisi/fakultas/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/admisi/fakultas/form');
    }

    public function update($id)
    {
        $data['row'] = $this->admisi_m->load_fakultas($id)->row();
        $this->template->load('admin/template', 'admin/admisi/fakultas/form', $data);
    }

    public function prodi($hal, $id)
    {
        if ($hal == 'data') {
            $data['prodi'] = $this->admisi_m->load_prodi($id);
            $this->template->load('admin/template', 'admin/admisi/prodi/index', $data);
        } else if ($hal == 'insert') {
            $this->template->load('admin/template', 'admin/admisi/prodi/form');
        } else if ($hal == 'update') {
            $data['prodi'] = get_prodi_row($id)->row();
            $this->template->load('admin/template', 'admin/admisi/prodi/form', $data);
        }
    }

    function proses()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['insert_fakultas'])) {
            $this->admisi_m->insert_fakultas($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Penambahan Fakultas Baru Berhasil!');
                redirect('admin/admisi');
            } else {
                $this->session->set_flashdata('error', 'Penambahan Fakultas Baru Gagal! <br> Patikan ID Fakultas Belum terdaftar sebelumnya!');
                redirect('admin/admisi/insert');
            }
        } else if (isset($post['update_fakultas'])) {
            $this->admisi_m->update_fakultas($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Fakultas Baru Berhasil!');
                redirect('admin/admisi');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Fakultas Baru Gagal! <br> Patikan ID Fakultas Belum terdaftar sebelumnya!');
                redirect('admin/admisi/update/' . $post['id']);
            }
        } else if (isset($post['insert_prodi'])) {
            $this->admisi_m->insert_prodi($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Penambahan program studi Baru Berhasil!');
                redirect('admin/admisi/prodi/data/' . $post['id_fak']);
            } else {
                $this->session->set_flashdata('error', 'Penambahan program studi Baru Gagal! <br> Patikan data terdaftar sebelumnya!');
                redirect('admin/admisi/prodi/insert/' . $post['id_fak']);
            }
        } else if (isset($post['update_prodi'])) {
            $this->admisi_m->update_prodi($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan program studi Baru Berhasil!');
                redirect('admin/admisi/prodi/data/' . $post['id_fak']);
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan program studi Baru Gagal! <br> Patikan data terdaftar sebelumnya!');
                redirect('admin/admisi/prodi/update/' . $post['id']);
            }
        } else {
            redirect('admin/admisi');
        }
    }

    function delete($id)
    {
        $this->admisi_m->delete_fakultas($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Penghapusan Fakultas Berhasil!');
            redirect('admin/admisi');
        } else {
            $this->session->set_flashdata('error', 'Penghapusan Fakultas Gagal! <br> Coba kembali!');
            redirect('admin/admisi');
        }
    }

    function delete_prodi($id, $id_fak)
    {
        $this->admisi_m->delete_prodi($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Penghapusan Program Studi Berhasil!');
            redirect('admin/admisi/prodi/data/' . $id_fak);
        } else {
            $this->session->set_flashdata('error', 'Penghapusan Program Studi Gagal! <br> Coba kembali!');
            redirect('admin/admisi/prodi/data/' . $id_fak);
        }
    }
}
