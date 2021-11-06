<?php defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_m extends CI_Model
{

    function insert_konsultasi($post)
    {
        $params = [
            'id_konsultasi' => $post['id'],
            'subyek_konsultasi' => $post['subjct'],
            'params1_konsultasi' => $post['params1'],
            'params2_konsultasi' => $post['params2'],
            'params3_konsultasi' => $post['params3'],
            'params4_konsultasi' => $post['params4'],
            'author_konsultasi' => profil()->id_user,
            'status_konsultasi' => 0,
        ];
        $this->db->insert('tbl_konsultasi', $params);
    }
}
