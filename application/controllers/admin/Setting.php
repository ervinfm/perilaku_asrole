<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('admin/setting_m');
    }

    public function index()
    {
        $data['row'] = $this->setting_m->get()->row();
        $this->template->load('admin/template', 'admin/setting/index', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['sistem'])) {
            $sistem = $this->setting_m->get()->row();

            $config['upload_path']    = './assets/image/logo';
            $config['allowed_types']  = 'jpg|png|jpeg|ico';
            $config['max_size']       = 10000;
            $config['file_name']       = 'logo-' . random_string('alnum', 30);
            $this->load->library('upload', $config);
            $gambar = $this->upload->do_upload('image');
            if ($gambar == true) {
                if (profil()->image_user != null) {
                    $target_file = './assets/image/logo/' . $sistem->logo_sistem;
                    unlink($target_file);
                    $post['image'] = $this->upload->data('file_name');
                } else if ($sistem->logo_sistem == null) {
                    $post['image'] = $this->upload->data('file_name');
                }
            } else {
                $post['image'] = $sistem->logo_sistem;
            }
            $this->setting_m->update($post);
            if ($this->db->affected_rows() > 0) {
                insert_user_log(uri_string());
                $this->session->set_flashdata('succes', 'Pembaharuan Sistem Berhasil!');
                redirect('admin/setting');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Sistem Gagal!');
                redirect('admin/setting');
            }
        } else if (isset($post['auth_setting'])) {
            if (cek_user_setting($post)->num_rows() > 0) {
                $akses['setting_token'] = random_string('alnum', 50);
                $this->session->set_userdata($akses);
                insert_user_log(uri_string());
                redirect('admin/setting');
            } else {
                $this->session->set_flashdata('passw', $post['s_pass']);
                $this->session->set_flashdata('error', 'Password Akun Anda Salah!<br> Silahkan Coba Lagi!');
                redirect('admin/setting');
            }
        } else {
            redirect('admin/setting');
        }
    }

    function status($val)
    {
        $this->setting_m->update_status($val);
        redirect('admin/setting');
    }

    function reset_logo()
    {
        $sistem = $this->setting_m->get()->row();
        $target_file = './assets/image/logo/' . $sistem->logo_sistem;
        unlink($target_file);
        $this->setting_m->reset_logo();
        if ($this->db->affected_rows() > 0) {
            insert_user_log(uri_string());
            $this->session->set_flashdata('succes', 'Reset Logo Sistem Berhasil!');
            redirect('admin/setting');
        } else {
            $this->session->set_flashdata('error', 'Reset Logo Sistem Gagal!');
            redirect('admin/setting');
        }
    }
}
