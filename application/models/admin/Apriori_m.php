<?php defined('BASEPATH') or exit('No direct script access allowed');

class Apriori_m extends CI_Model
{

    function data_load_by_date($date1, $date2)
    {
        $this->db->from('tbl_dataset');
        $this->db->where('datetime_dataset >=', $date1);
        $this->db->where('datetime_dataset <=', $date2);
        $this->db->order_by('datetime_dataset', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    function insert_proses_log($post)
    {
        $params = [
            'id_proses' => $post['id'],
            'date_first' => $post['d_first'],
            'date_last' => $post['d_last'],
            'min_support' => $post['p_support'],
            'min_confident' => $post['p_confident'],
            'kriteria_proses' => $post['kriteria'],
            'author_proses' => profil()->id_user,
            'status_proses' => 0,
        ];
        $this->db->insert('tbl_proses_log', $params);
    }

    function reset_proses($id)
    {
        $this->db->where('id_proses', $id);
        $this->db->delete('tbl_proses_log');
    }

    function reset_itemset($id)
    {
        $this->db->where('id_proses', $id);
        $this->db->delete('tbl_itemset1');
    }
}
