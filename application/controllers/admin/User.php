<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/user_m');
    }

    public function index()
    {
        $data = [
            'row' => $this->user_m->user(),
        ];
        $this->template->load('admin/template', 'admin/user/index', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            $this->user_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pengguna Baru Berhasil di Ditambahkan!');
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('error', 'Pengguna Baru Gagal di Ditambahkan!');
                redirect('admin/user');
            }
        } else  if (isset($post['update'])) {
            $this->user_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pengguna Baru Berhasil di Diperbaharui!');
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('error', 'Pengguna Baru Gagal di Diperbaharui!');
                redirect('admin/user');
            }
        }
    }

    function delete($id)
    {
        $this->user_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Pengguna Baru Berhasil di Dihapus!');
            redirect('admin/user');
        } else {
            $this->session->set_flashdata('error', 'Pengguna Baru Gagal di Dihapus!');
            redirect('admin/user');
        }
    }
}
