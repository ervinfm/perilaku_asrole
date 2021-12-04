<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi_m extends CI_Model
{

    function load_rek_fakultas($id = null)
    {
        $this->db->from('tb_rekomendasi');
        if ($id != null) {
            $this->db->where('id_rekomendasi', $id);
        } else {
            $this->db->where('level_rekomendasi', 1);
            $this->db->order_by('keriteria_rekomendasi', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function load_rek_individu($id = null)
    {
        $this->db->from('tb_rekomendasi');
        if ($id != null) {
            $this->db->where('id_rekomendasi', $id);
        } else {
            $this->db->where('level_rekomendasi', 2);
            $this->db->order_by('keriteria_rekomendasi', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }
}
