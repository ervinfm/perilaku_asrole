<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    function user($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        } else {
            $this->db->order_by('created_user', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_user' => random_string('alnum', 30),
            'id_fakultas' => $post['u_fakultas'],
            'id_prodi' => $post['u_prodi'],
            'nim_user' => $post['u_nim'],
            'email_user' => $post['u_email'],
            'nama_user' => $post['u_nama'],
            'username_user' => $post['u_username'],
            'password_user' => sha1($post['u_username']),
            'level_user' => $post['u_level'],
            'status_user' => $post['u_status'],
        ];
        $this->db->insert('tbl_user', $params);
    }

    function update($post)
    {
        $params = [
            'id_fakultas' => $post['u_fakultas'],
            'id_prodi' => $post['u_prodi'],
            'nim_user' => $post['u_nim'],
            'email_user' => $post['u_email'],
            'nama_user' => $post['u_nama'],
            'username_user' => $post['u_username'],
            'level_user' => $post['u_level'],
            'status_user' => $post['u_status'],
        ];
        if ($post['u_pass'] != null) {
            $params['password_user'] = sha1($post['u_pass']);
        }
        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
}
