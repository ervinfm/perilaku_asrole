<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admisi_m extends CI_Model
{

    function load_fakultas($id = null)
    {
        $this->db->from('tb_fakultas');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        } else {
            $this->db->order_by('id_fakultas', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function load_prodi($id = null, $id_prodi = null)
    {
        $this->db->from('tb_prodi');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }

        if ($id_prodi != null) {
            $this->db->where('id_prodi', $id);
        }
        $this->db->order_by('nama_prodi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function insert_fakultas($post)
    {
        $params = [
            'id_fakultas' => $post['f_id'],
            'nama_fakultas' => $post['f_nama']
        ];
        $this->db->insert('tb_fakultas', $params);
    }

    function update_fakultas($post)
    {
        $params = [
            'id_fakultas' => $post['f_id'],
            'nama_fakultas' => $post['f_nama']
        ];
        $this->db->where('id_fakultas', $post['id']);
        $this->db->update('tb_fakultas', $params);
    }

    function delete_fakultas($id)
    {
        $this->db->where('id_fakultas', $id);
        $this->db->delete('tb_fakultas');
    }

    function insert_prodi($post)
    {
        $params = [
            'id_prodi' => $post['p_id'],
            'id_fakultas' => $post['id_fak'],
            'nama_prodi' => $post['p_nama']
        ];
        $this->db->insert('tb_prodi', $params);
    }

    function update_prodi($post)
    {
        $params = [
            'id_prodi' => $post['p_id'],
            'nama_prodi' => $post['p_nama']
        ];
        $this->db->where('id_prodi', $post['id']);
        $this->db->update('tb_prodi', $params);
    }

    function delete_prodi($id)
    {
        $this->db->where('id_prodi', $id);
        $this->db->delete('tb_prodi');
    }
}
