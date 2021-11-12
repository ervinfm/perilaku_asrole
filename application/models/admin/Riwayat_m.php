<?php defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_m extends CI_Model
{

    function get_data($id_proses = null)
    {
        $this->db->from('tbl_proses_log');
        $this->db->where('author_proses', $this->session->userdata('user_id'));
        if ($id_proses != null) {
            $this->db->where('id_proses', $id_proses);
        } else {
            $this->db->where('status_proses', 1);
        }
        $this->db->order_by('created_proses', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
