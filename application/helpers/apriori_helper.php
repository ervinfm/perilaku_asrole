<?php

// Preprocessing Dataset
function get_itemset()
{
    $ci = &get_instance();
    $ci->db->from('tbl_dataset');
    $ci->db->order_by('itemset_dataset', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function get_fakultas_by_nameprodi($string)
{
    $ci = &get_instance();
    $ci->db->from('tb_prodi');
    $ci->db->like('nama_prodi', $string, 'both');
    $query = $ci->db->get();
    return $query->row();
}

function get_itemset_bydate($first, $last)
{
    $ci = &get_instance();
    $ci->db->from('tbl_dataset');
    $ci->db->where('datetime_dataset >=', $first);
    $ci->db->where('datetime_dataset <=', $last);
    $ci->db->order_by('datetime_dataset', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function get_last_itemset()
{
    $ci = &get_instance();
    $ci->db->from('tbl_dataset');
    $ci->db->group_by('itemset_dataset');
    $ci->db->order_by('itemset_dataset', 'DESC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    return $query->row();
}

function cek_itemset($id_proses, $itemset, $fak, $lolos = TRUE)
{
    $ci = &get_instance();
    if ($itemset == 1) {
        $ci->db->from('tbl_itemset1');
    } else  if ($itemset == 2) {
        $ci->db->from('tbl_itemset2');
    } else  if ($itemset == 3) {
        $ci->db->from('tbl_itemset3');
    }
    if ($lolos == TRUE) {
        $ci->db->where('lolos', 1);
    }
    $ci->db->where('id_proses', $id_proses);
    $ci->db->where('id_fakultas', $fak);
    $query = $ci->db->get();
    return $query;
}

function parameter_data($data, $type = 1)
{
    if ($type == 1) {
        if ($data > 3) {
            return 1;
        } else {
            return 0;
        }
    } else if ($type == 2) {
        return $data;
    }
}

function transformation_data($data)
{
    $datas = explode(",", $data);
    foreach ($datas as $x => $x_value) {
        echo parameter_data($x_value, 1) . ',';
    }
}

function transfor_data($data)
{
    $temp = null;
    $datas = explode(",", $data);
    foreach ($datas as $x => $string) {
        if ($string > 3) {
            $temp = $temp . 'P' . ($x + 1) . ',';
        }
    }
    return $temp;
}

function cek_kesamaan_data_array($data1, $data2)
{
    $datas1 = explode(",", $data1); //P1,P2
    $datas2 = explode(",", $data2); //P1,P3
    $temp = null;

    if ($datas1[0] != $datas2[0] && $datas1[1] != $datas2[0]) {
        $temp = $datas1[0] . ',' . $datas1[1] . ',' . $datas2[0];
        sqrt($temp);
        return $temp;
    } else if ($datas1[0] != $datas2[1] && $datas1[1] != $datas2[1]) {
        $temp = $datas1[0] . ',' . $datas1[1] . ',' . $datas2[1];
        sqrt($temp);
        return $temp;
    }
}

// Algoritma Apriori

function get_last_apriori($status = 0)
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_log');
    $ci->db->where('author_proses', $ci->session->userdata('user_id'));
    $ci->db->where('status_proses', $status);
    $ci->db->order_by('created_proses', 'DESC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    return $query;
}

function get_apriori($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_log');
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query->row();
}

function get_support_relative($min_support)
{
    $datas = get_itemset();
    return round(($min_support / $datas->num_rows()) * 100, 2);
}

function get_frequent_support($data, $atribut = null)
{
    $params = [
        'sup1' => 0,
        'sup2' => 0,
        'sup3' => 0,
        'sup4' => 0,
        'sup5' => 0,
    ];

    $datas = explode(",", $data);
    foreach ($datas as $x => $x_value) {
        if ($x_value == 1) {
            $params['sup1'] = $params['sup1'] + 1;
        } else if ($x_value == 2) {
            $params['sup2'] = $params['sup2'] + 1;
        } else if ($x_value == 3) {
            $params['sup3'] = $params['sup3'] + 1;
        } else if ($x_value == 4) {
            $params['sup4'] = $params['sup4'] + 1;
        } else if ($x_value == 5) {
            $params['sup5'] = $params['sup5'] + 1;
        }
    }
    return $params[$atribut];
}

function get_support_params1($row)
{
    $var1 = $var2 = $var3 = $var4 = $var5 = 0;

    foreach ($row->result() as $key => $data) {
        $var1 = $var1 + get_frequent_support($data->params1_dataset, 'sup1');
        $var2 = $var2 + get_frequent_support($data->params1_dataset, 'sup2');
        $var3 = $var3 + get_frequent_support($data->params1_dataset, 'sup3');
        $var4 = $var4 + get_frequent_support($data->params1_dataset, 'sup4');
        $var5 = $var5 + get_frequent_support($data->params1_dataset, 'sup5');
    }

    $all1 = $var1 + $var2 + $var3 + $var4 + $var5;

    $params = [
        'count1' => $var1,
        'count2' => $var2,
        'count3' => $var3,
        'count4' => $var4,
        'count5' => $var5,
        'support1' => round(($var1 / $all1) * 100, 1),
        'support2' => round(($var2 / $all1) * 100, 1),
        'support3' => round(($var3 / $all1) * 100, 1),
        'support4' => round(($var4 / $all1) * 100, 1),
        'support5' => round(($var5 / $all1) * 100, 1),
        'count_all' => $all1,
    ];
    return $params;
}

function get_support_params2($row)
{
    $var1 = 0;
    $var2 = 0;
    $var3 = 0;
    $var4 = 0;
    $var5 = 0;

    foreach ($row->result() as $key => $data) {
        $var1 = $var1 + get_frequent_support($data->params2_dataset, 'sup1');
        $var2 = $var2 + get_frequent_support($data->params2_dataset, 'sup2');
        $var3 = $var3 + get_frequent_support($data->params2_dataset, 'sup3');
        $var4 = $var4 + get_frequent_support($data->params2_dataset, 'sup4');
        $var5 = $var5 + get_frequent_support($data->params2_dataset, 'sup5');
    }

    $all1 = $var1 + $var2 + $var3 + $var4 + $var5;

    $params = [
        'count1' => $var1,
        'count2' => $var2,
        'count3' => $var3,
        'count4' => $var4,
        'count5' => $var5,
        'support1' => round(($var1 / $all1) * 100, 1),
        'support2' => round(($var2 / $all1) * 100, 1),
        'support3' => round(($var3 / $all1) * 100, 1),
        'support4' => round(($var4 / $all1) * 100, 1),
        'support5' => round(($var5 / $all1) * 100, 1),
        'count_all' => $all1,
    ];
    return $params;
}

function get_support_params3($row)
{
    $var1 = 0;
    $var2 = 0;
    $var3 = 0;
    $var4 = 0;
    $var5 = 0;

    foreach ($row->result() as $key => $data) {
        $var1 = $var1 + get_frequent_support($data->params3_dataset, 'sup1');
        $var2 = $var2 + get_frequent_support($data->params3_dataset, 'sup2');
        $var3 = $var3 + get_frequent_support($data->params3_dataset, 'sup3');
        $var4 = $var4 + get_frequent_support($data->params3_dataset, 'sup4');
        $var5 = $var5 + get_frequent_support($data->params3_dataset, 'sup5');
    }

    $all1 = $var1 + $var2 + $var3 + $var4 + $var5;

    $params = [
        'count1' => $var1,
        'count2' => $var2,
        'count3' => $var3,
        'count4' => $var4,
        'count5' => $var5,
        'support1' => round(($var1 / $all1) * 100, 1),
        'support2' => round(($var2 / $all1) * 100, 1),
        'support3' => round(($var3 / $all1) * 100, 1),
        'support4' => round(($var4 / $all1) * 100, 1),
        'support5' => round(($var5 / $all1) * 100, 1),
        'count_all' => $all1,
    ];
    return $params;
}

function get_support_params4($row)
{
    $var1 = 0;
    $var2 = 0;
    $var3 = 0;
    $var4 = 0;
    $var5 = 0;

    foreach ($row->result() as $key => $data) {
        $var1 = $var1 + get_frequent_support($data->params4_dataset, 'sup1');
        $var2 = $var2 + get_frequent_support($data->params4_dataset, 'sup2');
        $var3 = $var3 + get_frequent_support($data->params4_dataset, 'sup3');
        $var4 = $var4 + get_frequent_support($data->params4_dataset, 'sup4');
        $var5 = $var5 + get_frequent_support($data->params4_dataset, 'sup5');
    }

    $all1 = $var1 + $var2 + $var3 + $var4 + $var5;

    $params = [
        'count1' => $var1,
        'count2' => $var2,
        'count3' => $var3,
        'count4' => $var4,
        'count5' => $var5,
        'support1' => round(($var1 / $all1) * 100, 1),
        'support2' => round(($var2 / $all1) * 100, 1),
        'support3' => round(($var3 / $all1) * 100, 1),
        'support4' => round(($var4 / $all1) * 100, 1),
        'support5' => round(($var5 / $all1) * 100, 1),
        'count_all' => $all1,
    ];
    return $params;
}

function getCombinations(...$arrays)
{
    $result = [[]];
    foreach ($arrays as $property => $property_values) {
        $temp = [];
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $temp[] = array_merge($result_item, [$property => $property_value]);
            }
        }
        $result = $temp;
    }
    return $result;
}

function get_proses_log($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_log');
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query->row();
}

function get_itemset_by_idproses($id_proses, $id_fak)
{
    $ci = &get_instance();
    $proses = get_proses_log($id_proses);

    $ci->db->from('tbl_dataset');
    $ci->db->where('datetime_dataset >=', $proses->date_first);
    $ci->db->where('datetime_dataset <=', $proses->date_last);
    $ci->db->where('id_fakultas ', $id_fak);
    $ci->db->order_by('datetime_dataset', 'DESC');
    $query = $ci->db->get();
    return $query;
}


function insert_itemset1($id, $id_fak, $atribut, $jumlah, $support, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id,
        'id_fakultas' => $id_fak,
        'atribut' => $atribut,
        'jumlah' => $jumlah,
        'support' => round($support, 2),
        'lolos' => $lolos,
    ];
    $ci->db->insert('tbl_itemset1', $params);
}

function insert_itemset2($id, $id_fak, $atribut1, $atribut2, $jumlah, $support, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id,
        'id_fakultas' => $id_fak,
        'atribut1' => $atribut1,
        'atribut2' => $atribut2,
        'jumlah' => $jumlah,
        'support' => $support,
        'lolos' => $lolos,
    ];
    $ci->db->insert('tbl_itemset2', $params);
}

function insert_itemset3($id, $id_fak, $atribut1, $atribut2, $atribut3, $jumlah, $support, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id,
        'id_fakultas' => $id_fak,
        'atribut1' => $atribut1,
        'atribut2' => $atribut2,
        'atribut3' => $atribut3,
        'jumlah' => $jumlah,
        'support' => $support,
        'lolos' => $lolos,
    ];
    $ci->db->insert('tbl_itemset3', $params);
}


function insert_itemset_all($datas, $id, $iterasi)
{
    $proses = get_proses_log($id);

    $data1 = get_support_params1($datas);
    for ($i = 1; $i <= 5; $i++) {
        if ($data1['count' . $i] > $proses->min_support) {
            $val1 = [
                'id' => $id,
                'kriteria' => 1,
                'iterasi' => $iterasi,
                'atribut' => $i,
                'count' => $data1['count' . $i],
                'support' => $data1['support' . $i],
            ];
        }
    }
}

function get_iterasi1_byid($id = null, $fak = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset1');
    if ($id != null && $fak != null) {
        $ci->db->where('id_proses', $id);
        $ci->db->where('id_fakultas', $fak);
    } else if ($id != null) {
        $ci->db->where('id_proses', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function get_iterasi2_byid($id = null, $fak = null, $lolos = false)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset2');
    if ($id != null && $fak != null) {
        $ci->db->where('id_proses', $id);
        $ci->db->where('id_fakultas', $fak);
    } else if ($id != null) {
        $ci->db->where('id_proses', $id);
    }
    if ($lolos == TRUE) {
        $ci->db->where('lolos', 1);
    }
    $query = $ci->db->get();
    return $query;
}

function get_iterasi3_byid($id = null, $fak = null, $lolos = false)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset3');
    if ($id != null && $fak != null) {
        $ci->db->where('id_proses', $id);
        $ci->db->where('id_fakultas', $fak);
    } else if ($id != null) {
        $ci->db->where('id_proses', $id);
    }
    if ($lolos == TRUE) {
        $ci->db->where('lolos', 1);
    }
    $query = $ci->db->get();
    return $query;
}

function get_iterasi_byfak($id, $date1, $date2)
{
    $ci = &get_instance();
    $ci->db->from('tbl_dataset');
    $ci->db->where('id_fakultas', $id);
    $ci->db->where('datetime_dataset >=', $date1);
    $ci->db->where('datetime_dataset <=', $date2);
    $ci->db->order_by('datetime_dataset', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function cek_atribut_itemset3($id, $atribut1, $atribut2, $atribut3)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset3');
    $ci->db->where('id_proses', $id);
    $ci->db->where('atribut1', $atribut1);
    $ci->db->where('atribut2', $atribut2);
    $ci->db->where('atribut3', $atribut3);
    return $ci->db->get();
}

function proses_iterasi1($post)
{
    $pert = [
        'p1' => null,
        'p2' => null,
        'p3' => null,
        'p4' => null,
        'p5' => null,
        'p6' => null,
        'p7' => null,
        'p8' => null,
        'p9' => null,
        'datas_count' => null,
        'seleksi' => null,
    ];

    foreach (get_fakultas()->result() as $key => $fakultas) {
        foreach (get_dataset_byfak($fakultas->id_fakultas, $post['d_first'], $post['d_last'])->result() as $key => $iterasi) {
            $i = $key + 1;
            if ($post['kriteria'] == 1) {
                $data = explode(",", $iterasi->params1_dataset);
            } else  if ($post['kriteria'] == 2) {
                $data = explode(",", $iterasi->params2_dataset);
            } else  if ($post['kriteria'] == 3) {
                $data = explode(",", $iterasi->params3_dataset);
            } else  if ($post['kriteria'] == 4) {
                $data = explode(",", $iterasi->params4_dataset);
            }

            foreach ($data as $ke => $val) {
                if ($val == 'P1') {
                    $pert['p1'] = $pert['p1'] + 1;
                } else if ($val == 'P2') {
                    $pert['p2'] = $pert['p2'] + 1;
                } else if ($val == 'P3') {
                    $pert['p3'] = $pert['p3'] + 1;
                } else if ($val == 'P4') {
                    $pert['p4'] = $pert['p4'] + 1;
                } else if ($val == 'P5') {
                    $pert['p5'] = $pert['p5'] + 1;
                } else if ($val == 'P6') {
                    $pert['p6'] = $pert['p6'] + 1;
                } else if ($val == 'P7') {
                    $pert['p7'] = $pert['p7'] + 1;
                } else if ($val == 'P8') {
                    $pert['p8'] = $pert['p8'] + 1;
                } else if ($val == 'P9') {
                    $pert['p9'] = $pert['p9'] + 1;
                }
            }
            $pert['datas_count'] = $pert['datas_count'] + 1;

            if ($pert['p' . $i] != null) {
                $sup = ($pert['p' . $i] / $pert['datas_count']) * 100;
                if ($pert['p' . $i] > $post['p_support']) {
                    $seleksi = 1;
                } else {
                    $seleksi = 0;
                }
                insert_itemset1($post['id'], $fakultas->id_fakultas, 'P' . $i, $pert['p' . $i], round($sup, 2), $seleksi);
            }
        }
    }
}

function proses_iterasi2($post)
{
    $paused = get_proses_log($post['id']);
    foreach (get_fakultas()->result() as $k => $fakultas) {
        $query = get_dataset_byfak($fakultas->id_fakultas, $post['d_first'], $post['d_last']);
        $atribut = null;
        foreach (get_iterasi1_byid($post['id'], $fakultas->id_fakultas)->result() as $key => $iterasi1) {
            if ($iterasi1->lolos == 1) {
                $atribut = $atribut . ',' . $iterasi1->atribut;
            }
        }

        $datas = explode(",", $atribut);
        for ($i = 1; $i < count($datas); $i++) {
            for ($j = $i + 1; $j <  count($datas); $j++) {
                foreach ($query->result() as $key => $params) {
                    if ($paused->kriteria_proses == 1) {
                        $data = explode(",", $params->params1_dataset);
                    } else  if ($paused->kriteria_proses == 2) {
                        $data = explode(",", $params->params2_dataset);
                    } else  if ($paused->kriteria_proses == 3) {
                        $data = explode(",", $params->params3_dataset);
                    } else  if ($paused->kriteria_proses == 4) {
                        $data = explode(",", $params->params4_dataset);
                    }
                }

                $count = 0;
                foreach ($data as $key => $x) {
                    if ($x == $datas[$i] || $x == $datas[$j]) {
                        $count++;
                    }
                }

                $support = ($count / $query->num_rows()) * 100;
                if ($count > $paused->min_support) {
                    $lolos = 1;
                } else {
                    $lolos = 0;
                }
                insert_itemset2($post['id'], $fakultas->id_fakultas, $datas[$i], $datas[$j], $count, round($support, 2), $lolos);
            }
        }
    }
}

function proses_iterasi3($post)
{
    $paused = get_proses_log($post['id']);
    foreach (get_fakultas()->result() as $k => $fakultas) {
        $itemset = cek_itemset($post['id'], 2, $fakultas->id_fakultas);
        foreach ($itemset->result() as $key => $value) {
            $data = array($value->atribut1, $value->atribut2);
            foreach ($itemset->result() as $key1 => $value2) {
                if (!in_array($value2->atribut1, $data)) {
                    $param1[$key] = $value->atribut1;
                    $param2[$key] = $value->atribut2;
                    $param3[$key] = $value2->atribut1;
                } else if (!in_array($value2->atribut2, $data)) {
                    $param1[$key] = $value->atribut1;
                    $param2[$key] = $value->atribut2;
                    $param3[$key] = $value2->atribut2;
                }
            }

            $cek1 = cek_atribut_itemset3($post['id'], $param1[$key], $param2[$key], $param3[$key]);
            $cek2 = cek_atribut_itemset3($post['id'], $param3[$key], $param2[$key], $param1[$key]);
            $cek3 = cek_atribut_itemset3($post['id'], $param2[$key], $param1[$key], $param3[$key]);
            $cek4 = cek_atribut_itemset3($post['id'], $param1[$key], $param3[$key], $param2[$key]);
            $cek5 = cek_atribut_itemset3($post['id'], $param3[$key], $param1[$key], $param2[$key]);
            $cek6 = cek_atribut_itemset3($post['id'], $param2[$key], $param3[$key], $param1[$key]);
            if ($cek1->num_rows() == 0 && $cek2->num_rows() == 0 && $cek3->num_rows() == 0 && $cek4->num_rows() == 0 && $cek5->num_rows() == 0 && $cek6->num_rows() == 0) {
                $temp1 = $param1[$key];
                $temp2 = $param2[$key];
                $temp3 = $param3[$key];
                $count = 0;
                foreach (get_itemset_bydate($paused->date_first, $paused->date_last)->result() as $key100 => $iterasi100) {
                    if ($paused->kriteria_proses == 1) {
                        $db = explode(",", $iterasi100->params1_dataset);
                    } else if ($paused->kriteria_proses == 2) {
                        $db = explode(",", $iterasi100->params2_dataset);
                    } else if ($paused->kriteria_proses == 3) {
                        $db = explode(",", $iterasi100->params3_dataset);
                    } else if ($paused->kriteria_proses == 4) {
                        $db = explode(",", $iterasi100->params4_dataset);
                    }

                    if (in_array($temp1, $db) == TRUE && in_array($temp2, $db) == TRUE && in_array($temp3, $db) == TRUE) {
                        $count = $count + 1;
                    }
                }
                $support = ($count / get_itemset_bydate($paused->date_first, $paused->date_last)->num_rows()) * 100;
                if ($count > $post['p_support']) {
                    $seleksi = 1;
                } else {
                    $seleksi = 0;
                }
                insert_itemset3($post['id'], $fakultas->id_fakultas, $param1[$key], $param2[$key], $param3[$key], $count, round($support, 2), $seleksi);
            }
        }
    }
}


// Hasil Apriori

function insert_proses_hasil($id_proses, $id_fak, $kombinasi1, $kombinasi2, $sup_xUy, $sup_x, $conf, $n_a, $n_b, $n_ab, $px, $py, $pxuy, $lift, $korelasi, $iterasi, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id_proses,
        'id_fakultas' => $id_fak,
        'kombinasi1' => $kombinasi1,
        'kombinasi2' => $kombinasi2,
        'support_xUy' => $sup_xUy,
        'support_x' => $sup_x,
        'confidence' => $conf,
        'jumlah_a' => $n_a,
        'jumlah_b' => $n_b,
        'jumlah_ab' => $n_ab,
        'px' => $px,
        'py' => $py,
        'pxuy' => $pxuy,
        'uji_lift' => $lift,
        'aturan_korelasi' => $korelasi,
        'iterasi' => $iterasi,
        'lolos_proses_hasil' => $lolos,
    ];
    $ci->db->insert('tbl_proses_hasil', $params);
}

function get_hasil_apriori($id_proses, $id_fak = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_hasil');
    $ci->db->where('id_proses', $id_proses);
    // $ci->db->where('lolos_proses_hasil', 1);
    if ($id_fak != null) {
        $ci->db->where('id_fakultas', $id_fak);
    }
    $query = $ci->db->get();;
    return $query;
}

function get_iterasi($id_proses, $iterasi, $lolos = false)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset' . $iterasi);
    $ci->db->where('id_proses', $id_proses);
    if ($lolos == TRUE) {
        $ci->db->where('lolos', 1);
    }
    $query = $ci->db->get();;
    return $query;
}

function get_support_atribut($id_proses, $id_fak, $iterasi, $atribut1, $atribut2 = null, $atribut3 = null, $lolos = false)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset' . $iterasi);
    $ci->db->where('id_proses', $id_proses);
    $ci->db->where('id_fakultas', $id_fak);
    if ($iterasi == 1) {
        $ci->db->where('atribut', $atribut1);
    } else if ($iterasi == 2) {
        $ci->db->where('atribut1', $atribut1);
        $ci->db->where('atribut2', $atribut2);
        $ci->db->or_where('atribut1', $atribut2);
        $ci->db->where('atribut2', $atribut1);
    } else if ($iterasi == 3) {
        $ci->db->where('atribut1', $atribut1);
        $ci->db->where('atribut2', $atribut2);
        $ci->db->where('atribut3', $atribut3);
        $ci->db->or_where('atribut1', $atribut3);
        $ci->db->where('atribut2', $atribut2);
        $ci->db->where('atribut3', $atribut1);
        $ci->db->or_where('atribut1', $atribut1);
        $ci->db->where('atribut2', $atribut3);
        $ci->db->where('atribut3', $atribut2);
    }
    if ($lolos == TRUE) {
        $ci->db->where('lolos', 1);
    }
    $query = $ci->db->get();;
    return $query;
}

function korelasi_uji_lift($nilai_ul)
{
    if ($nilai_ul > 0) {
        return "Korelasi Positif";
    } else if ($nilai_ul < 0) {
        return "Korelasi Negatif";
    } else {
        return "Tidak Ada Korelasi";
    }
}

function cek_lolos_iterasi3($id_proses, $id_fakultas)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset3');
    $ci->db->where('id_proses', $id_proses);
    $ci->db->where('id_fakultas', $id_fakultas);
    // $ci->db->where('lolos', 1);
    $query = $ci->db->get();;
    return $query;
}

function cek_lolos_iterasi2($id_proses, $id_fakultas)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset2');
    $ci->db->where('id_proses', $id_proses);
    $ci->db->where('id_fakultas', $id_fakultas);
    $ci->db->where('lolos', 1);
    $query = $ci->db->get();;
    return $query;
}

function atuuran_asosiasi_hasilpt2($id, $id_fakultas)
{
    $proses_data = get_proses_log($id);
    foreach (cek_lolos_iterasi2($id, $id_fakultas)->result() as $key => $value) {
        $supxUy1 = get_support_atribut($id, $id_fakultas, 2, $value->atribut1)->row()->jumlah + get_support_atribut($id, $id_fakultas, 1, $value->atribut2)->row()->jumlah;
        $supx1 = get_support_atribut($id, $id_fakultas, 1, $value->atribut1, $value->atribut2)->row()->jumlah;
        $supxUy2 = get_support_atribut($id, $id_fakultas, 2, $value->atribut2)->row()->jumlah +  get_support_atribut($id, $id_fakultas, 1, $value->atribut1)->row()->jumlah;
        $supx2 = get_support_atribut($id, $id_fakultas, 1, $value->atribut2, $value->atribut1)->row()->jumlah;

        $confident1 = (($supx1 / $supxUy1) * 100) > 100 ? ((($supx1 / $supxUy1) * 100) / 2) : (($supx1 / $supxUy1) * 100);
        $confident2 = (($supx2 / $supxUy2) * 100) > 100 ? ((($supx2 / $supxUy2) * 100) / 2) : (($supx2 / $supxUy2) * 100);

        $jumlahAB1 = get_support_atribut($id, $id_fakultas, 2, $value->atribut1, $value->atribut2)->num_rows();
        $jumlahA1 = get_support_atribut($id, $id_fakultas, 1, $value->atribut1)->num_rows();
        $jumlahB1 = get_support_atribut($id, $id_fakultas, 1, $value->atribut2)->num_rows();

        $jumlahAB2 = get_support_atribut($id, $id_fakultas, 2, $value->atribut2, $value->atribut1)->num_rows();
        $jumlahA2 = get_support_atribut($id, $id_fakultas, 1, $value->atribut2)->num_rows();
        $jumlahB2 = get_support_atribut($id, $id_fakultas, 1, $value->atribut1)->num_rows();

        $dataset_count = get_itemset_by_idproses($id, $id_fakultas)->num_rows();
        $pAB1 = $jumlahAB1 / $dataset_count;
        $pA1 = $jumlahA1 / $dataset_count / $dataset_count;
        $pB1 = $jumlahB1 / $dataset_count / $dataset_count;

        $pAB2 = $jumlahAB2 / $dataset_count;
        $pA2 = $jumlahA2 / $dataset_count / $dataset_count;
        $pB2 = $jumlahB2 / $dataset_count / $dataset_count;

        $PaUb1 = $pAB1 / ($pA1 * $pB1);
        $PaUb2 = $pAB2 / ($pA2 * $pB2);

        $korelasi_1 = korelasi_uji_lift(ceil($PaUb1));
        $korelasi_2 = korelasi_uji_lift(ceil($PaUb2));

        $iterasi = 2;
        $lolos_1 = ($confident1 > $proses_data->min_confident ? 1 : 0);
        $lolos_2 = ($confident2 > $proses_data->min_confident ? 1 : 0);

        if ($confident1 > 25) {
            insert_proses_hasil($id, $id_fakultas, ($value->atribut1), $value->atribut2, $supxUy1, $supx1, round($confident1, 2), $jumlahA1, $jumlahB1, $jumlahAB1, $pA1, $pB1, $pAB1, substr(ceil($PaUb1), 0, 1), $korelasi_1, $iterasi, $lolos_1);
        }
        if ($confident2 > 25) {
            insert_proses_hasil($id, $id_fakultas, ($value->atribut2), $value->atribut1, $supxUy2, $supx2, round($confident2, 2), $jumlahA2, $jumlahA2, $jumlahAB2, $pA2, $pB2, $pAB2, substr(ceil($PaUb2), 0, 1), $korelasi_2, $iterasi, $lolos_2);
        }
    }
}

function aturan_asosiasi_hasil($id)
{
    $proses_data = get_proses_log($id);
    foreach (get_fakultas()->result() as $k => $fakultas) {
        if (cek_lolos_iterasi3($id, $fakultas->id_fakultas)->num_rows() > 0) {
            foreach (cek_lolos_iterasi3($id, $fakultas->id_fakultas)->result() as $key => $value) {
                $supxUy1 = get_support_atribut($id, $fakultas->di_fakultas, 2, $value->atribut1, $value->atribut2)->row()->jumlah + get_support_atribut($id, $fakultas->di_fakultas, 1, $value->atribut3)->row()->jumlah;
                $supx1 = get_support_atribut($id, $fakultas->di_fakultas, 1, $value->atribut1, $value->atribut2)->row()->jumlah;
                $supxUy2 = get_support_atribut($id, $fakultas->di_fakultas, 2, $value->atribut3, $value->atribut2)->row()->jumlah +  get_support_atribut($id, $fakultas->di_fakultas, 1, $value->atribut1)->row()->jumlah;
                $supx2 = get_support_atribut($id, $fakultas->di_fakultas, 1, $value->atribut3, $value->atribut2)->row()->jumlah;
                $supxUy3 =  get_support_atribut($id, $fakultas->di_fakultas, 2, $value->atribut1, $value->atribut3)->row()->jumlah +  get_support_atribut($id, $fakultas->di_fakultas, 1, $value->atribut2)->row()->jumlah;
                $supx3 =  get_support_atribut($id, $fakultas->di_fakultas, 1, $value->atribut1, $value->atribut3)->row()->jumlah;

                $confident1 = (($supx1 / $supxUy1) * 100) > 100 ? ((($supx1 / $supxUy1) * 100) / 2) : (($supx1 / $supxUy1) * 100);
                $confident2 = (($supx2 / $supxUy2) * 100) > 100 ? ((($supx2 / $supxUy2) * 100) / 2) : (($supx2 / $supxUy2) * 100);
                $confident3 = (($supx3 / $supxUy3) * 100) > 100 ? ((($supx3 / $supxUy3) * 100) / 2) : (($supx3 / $supxUy3) * 100);

                $lolos_1 = ($confident1 > $proses_data->min_confident ? 1 : 0);
                $lolos_2 = ($confident2 > $proses_data->min_confident ? 1 : 0);
                $lolos_3 = ($confident3 > $proses_data->min_confident ? 1 : 0);

                $jumlahAB1 = get_support_atribut($id, $fakultas->id_fakultas, 3, $value->atribut1, $value->atribut2, $value->atribut3)->num_rows();
                $jumlahA1 =  get_support_atribut($id, $fakultas->id_fakultas, 2, $value->atribut1, $value->atribut2)->num_rows();
                $jumlahB1 = get_support_atribut($id, $fakultas->id_fakultas, 1, $value->atribut3)->num_rows();

                $jumlahAB2 = get_support_atribut($id, $fakultas->id_fakultas, 3, $value->atribut1, $value->atribut2, $value->atribut3)->num_rows();
                $jumlahA2 =  get_support_atribut($id, $fakultas->id_fakultas, 2, $value->atribut3, $value->atribut2)->num_rows();
                $jumlahB2 = get_support_atribut($id, $fakultas->id_fakultas, 1, $value->atribut1)->num_rows();

                $jumlahAB3 = get_support_atribut($id, $fakultas->id_fakultas, 3, $value->atribut1, $value->atribut2, $value->atribut3)->num_rows();
                $jumlahA3 =  get_support_atribut($id, $fakultas->id_fakultas, 2, $value->atribut1, $value->atribut3)->num_rows();
                $jumlahB3 = get_support_atribut($id, $fakultas->id_fakultas, 1, $value->atribut2)->num_rows();

                $dataset_count = get_itemset_by_idproses($id, $fakultas->id_fakultas)->num_rows();
                $pAB1 = $jumlahAB1 / $dataset_count;
                $pA1 = $jumlahA1 / $dataset_count;
                $pB1 = $jumlahB1 / $dataset_count;

                $pAB2 = $jumlahAB2 / $dataset_count;
                $pA2 = $jumlahA2 / $dataset_count;
                $pB2 = $jumlahB2 / $dataset_count;

                $pAB3 = $jumlahAB3 / $dataset_count;
                $pA3 = $jumlahA3 / $dataset_count;
                $pB3 = $jumlahB3 / $dataset_count;


                $PaUb1 = $pAB1 / ($pA1 * $pB1);
                $PaUb2 = $pAB2 / ($pA2 * $pB2);
                $PaUb3 = $pAB3 / ($pA3 * $pB3);

                $korelasi_1 = korelasi_uji_lift(ceil($PaUb1));
                $korelasi_2 = korelasi_uji_lift(ceil($PaUb2));
                $korelasi_3 = korelasi_uji_lift(ceil($PaUb3));

                $iterasi = 3;

                insert_proses_hasil($proses_data->id_proses, $fakultas->id_fakultas, ($value->atribut1 . ',' . $value->atribut2), $value->atribut3, $supxUy1, $supx1, round($confident1, 2), $jumlahA1, $jumlahB1, $jumlahAB1, $pA1, $pB1, $pAB1, ceil($PaUb1), $korelasi_1, $iterasi, $lolos_1);
                insert_proses_hasil($proses_data->id_proses, $fakultas->id_fakultas, ($value->atribut3 . ',' . $value->atribut2), $value->atribut1, $supxUy2, $supx2, round($confident2, 2), $jumlahA2, $jumlahA2, $jumlahAB2, $pA2, $pB2, $pAB2, ceil($PaUb2), $korelasi_2, $iterasi, $lolos_2);
                insert_proses_hasil($proses_data->id_proses, $fakultas->id_fakultas, ($value->atribut1 . ',' . $value->atribut3), $value->atribut2, $supxUy3, $supx3, round($confident3, 2), $jumlahA3, $jumlahA3, $jumlahAB3, $pA3, $pB3, $pAB3, ceil($PaUb3), $korelasi_3, $iterasi, $lolos_3);
            }
            atuuran_asosiasi_hasilpt2($id, $fakultas->id_fakultas);
        } else if (cek_lolos_iterasi2($id, $fakultas->id_fakultas)->num_rows() > 0) {
            atuuran_asosiasi_hasilpt2($id, $fakultas->id_fakultas);
        }
    }
}

function get_perilaku_transpost($perilaku, $atribut)
{
    switch ($atribut) {
        case 1:
            if ($perilaku == 'P1') {
                return "Percaya bahwa Allah selalu hadir setiap saat";
            } else  if ($perilaku == 'P2') {
                return "Percaya saat mengalami masalah Allah menolong dengan jalan yang tidak terduga";
            } else  if ($perilaku == 'P3') {
                return "Saat mengalami masalah terpikir mengambil jalan yang salah seperti bunuh diri atau menggunakan narkoba";
            } else  if ($perilaku == 'P4') {
                return "Menjadi mahasiswa merupakan bagian dari ibadah untuk menggapai surga kelak di akhirat";
            } else  if ($perilaku == 'P5') {
                return "Meyakini hidup dan mati sebagai sebuah ujian";
            } else  if ($perilaku == 'P6') {
                return "Membaca Al-Quran setiap hari";
            } else  if ($perilaku == 'P7') {
                return "Melakukan salat 5 waktu";
            } else  if ($perilaku == 'P8') {
                return "Berzikir dan berdoa setelah salat fardu";
            } else  if ($perilaku == 'P9') {
                return "Bersyukur atas nikmat yang telah diberikan";
            }
            break;
        case 2:
            if ($perilaku == 'P1') {
                return "Memiliki keluarga dan teman yang mendukung kamu";
            } else  if ($perilaku == 'P2') {
                return "Memiliki teman dan kehidupan sosial yang membahagiakan";
            } else  if ($perilaku == 'P3') {
                return "Memiliki banyak waktu bersama orang-orang yang membuat bahagia";
            } else  if ($perilaku == 'P4') {
                return "Berani menyatakan ???????tidak??????? dengan nyaman untuk hal yang tidak disukai";
            } else  if ($perilaku == 'P5') {
                return "Melakukan komunikasi dan aktivitas yang menyenangkan dengan keluarga atau teman setidaknya seminggu sekali";
            } else  if ($perilaku == 'P6') {
                return "Merasa bahwa kehidupan pribadi mendukung aktivitas perkuliahan";
            } else  if ($perilaku == 'P7') {
                return "Berani meminta bantuan saat membutuhkan";
            }
            break;
        case 3:
            if ($perilaku == 'P1') {
                return "Kesulitan untuk melaksanakan penelitian skripsiselama pandemi";
            } else  if ($perilaku == 'P2') {
                return "Kesulitan mengikuti perkuliahan secara daring";
            } else  if ($perilaku == 'P3') {
                return "Tugas selama pandemi terlalu banyak";
            } else  if ($perilaku == 'P4') {
                return "Kesulitan mengikuti ujian dengan metode daring selama pandemi";
            }
            break;
        case 4:
            if ($perilaku == 'P1') {
                return "Broken home";
            } else  if ($perilaku == 'P2') {
                return "Merasa bahwa anggota keluarga tidak peduli";
            } else  if ($perilaku == 'P3') {
                return "Kehilangan anggota keluarga yang sangat disayangi";
            } else  if ($perilaku == 'P4') {
                return "Orang tua terlalu mendominasi dalam memutuskan segala hal";
            } else  if ($perilaku == 'P5') {
                return "Adanya permasalahan keluarga yang cukup berat (PHK)";
            }
            break;
    }
}

function level_stres($value)
{
    if ($value >= 75) {
        return "Stres Berat";
    } else if ($value < 75 && $value >= 50) {
        return "Stres Sedang";
    } else if ($value < 50 && $value >= 25) {
        return "Stres Ringan";
    } else if ($value < 25) {
        return "Normal";
    }
}

function get_rerata_conf_fak($id_proses, $id_fakultas)
{
    $count = $average = 0;
    if (get_hasil_apriori($id_proses, $id_fakultas)->num_rows() > 0) {
        foreach (get_hasil_apriori($id_proses, $id_fakultas)->result() as $key => $data) {
            $count = $count + $data->confidence;
        }
        $average = $count / get_hasil_apriori($id_proses, $id_fakultas)->num_rows();
        return round($average);
    } else {
        return 0;
    }
}

function predikat_analitik($val)
{
    if ($val > 80) {
        return "E";
    } else if ($val <= 80 && $val > 60) {
        return "D";
    } else if ($val <= 60 && $val > 40) {
        return "C";
    } else if ($val <= 40 && $val > 20) {
        return "B";
    } else {
        return "A";
    }
}

function set_analitik($id_proses, $id_fakultas, $conf, $predikat)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id_proses,
        'id_fakultas' => $id_fakultas,
        'conf_analitik' => $conf,
        'predikat_analitik' => $predikat,
    ];
    $ci->db->insert('tbl_proses_analitik', $params);
}

function analitik_hasil($id_proses)
{
    foreach (get_fakultas()->result() as $key => $fakultas) {
        $conf = get_rerata_conf_fak($id_proses, $fakultas->id_fakultas);
        $predikat = predikat_analitik($conf);
        set_analitik($id_proses, $fakultas->id_fakultas, $conf, $predikat);
    }
}

function get_analitik($id_proses)
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_analitik');
    $ci->db->where('id_proses', $id_proses);
    $ci->db->order_by('conf_analitik', 'ASC');
    $query = $ci->db->get();;
    return $query;
}
