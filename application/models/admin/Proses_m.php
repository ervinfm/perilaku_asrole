<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proses_m extends CI_Model
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
}
