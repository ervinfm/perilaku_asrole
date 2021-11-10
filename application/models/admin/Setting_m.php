<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting_m extends CI_Model
{

    function get()
    {
        $this->db->from('tbl_sistem');
        $query = $this->db->get();
        return $query;
    }

    function update($post)
    {
        $params = [
            'nama_sistem' => $post['s_nama'],
            'email_sistem' => $post['s_email'],
            'pass_email_sistem' => $post['s_email_pass'],
            'logo_sistem' => $post['image'],
            'admin_sistem' => $post['s_admin'],
            'updated_sistem' => date('Y-m-d H:i:s'),

        ];
        $this->db->update('tbl_sistem', $params);
    }

    function update_status($status)
    {
        $params = [
            'status_sistem' => $status,
            'updated_sistem' => date('Y-m-d H:i:s'),
        ];
        $this->db->update('tbl_sistem', $params);
    }

    function reset_logo()
    {
        $params = [
            'logo_sistem' => null,
            'updated_sistem' => date('Y-m-d H:i:s'),
        ];
        $this->db->update('tbl_sistem', $params);
    }

    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
}
