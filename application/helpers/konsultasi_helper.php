<?php

function insert_log($id_proses, $id_konsultasi, $min_sup, $min_conf)
{
    $ci = &get_instance();
    $params = [
        'id_proses'  => $id_proses,
        'id_konsultasi' => $id_konsultasi,
        'min_support' => $min_sup,
        'min_confident' => $min_conf,
        'author_proses' => $ci->session->userdata('user_id'),
        'status_proses' => 0,
    ];
    $ci->db->insert('tbl_konsultasi_log', $params);
}

function get_konsultasi_proses($id)
{
    $ci = &get_instance();
    $ci->fb->from('tbl_konsultasi_log');
    $ci->db->where('author_proses', $ci->session->userdata('user_id'));
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query;
}
