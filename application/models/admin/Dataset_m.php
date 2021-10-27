<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dataset_m extends CI_Model
{

    function data_load($id = null)
    {
        $this->db->from('tbl_dataset');
        if ($id != null) {
            $this->db->where('id_dataset', $id);
        } else {
            $this->db->order_by('datetime_dataset', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function load_transit($id = null)
    {
        $this->db->from('tbl_dataset_transit');
        if ($id != null) {
            $this->db->where('id_dataset', $id);
        } else {
            $this->db->order_by('datetime_dataset', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function reset_dataset()
    {
        $this->db->empty_table('tbl_dataset');
    }

    function upload($data)
    {
        $this->db->insert_batch('tbl_dataset_transit', $data);
    }

    function reset_transit()
    {
        $this->db->empty_table('tbl_dataset_transit');
    }

    function cleaning_data($id)
    {
        $this->db->where('id_dataset', $id);
        $this->db->delete('tbl_dataset_transit');
    }

    function submit($data)
    {
        $this->db->insert('tbl_dataset', $data);
    }
}
