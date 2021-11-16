<?php defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_m extends CI_Model
{

    function get_riwayat()
    {
        $this->db->from('tbl_konsultasi_log');
        $this->db->where('author_proses', $this->session->userdata('user_id'));
        $this->db->order_by('created_proses', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
