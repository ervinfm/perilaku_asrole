<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    function auth($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['username']);
        $query = $this->db->get();
        return $query;
    }

    function auth_pass($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['username']);
        $this->db->where('password_user', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    function update_profil($post)
    {
        $params = [
            'email_user' => $post['p_email'],
            'nama_user' => $post['p_nama'],
            'username_user' => $post['p_username'],
            'image_user' => $post['image'],

        ];
        if ($post['p_pass'] != null) {
            $params['password_user'] = sha1($post['p_pass']);
        }

        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function sign_up($post)
    {
        $params = [
            'id_user' => $post['id'],
            'id_fakultas' => $post['s_fakultas'],
            'id_prodi' => $post['s_prodi'],
            'email_user' => $post['s_email'],
            'nama_user' => $post['s_name'],
            'nim_user' => $post['s_nim'],
            'username_user' => $post['s_username'],
            'password_user' => sha1($post['s_password']),
            'level_user' => 2,
            'status_user' => 0,
        ];
        $this->db->insert('tbl_user', $params);
    }

    function activate($id)
    {
        $params = [
            'status_user' => 1,
        ];

        $this->db->where('id_user', $id);
        $this->db->update('tbl_user', $params);
    }
}
