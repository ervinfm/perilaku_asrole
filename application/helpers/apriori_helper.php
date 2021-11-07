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
        if ($string > 1) {
            $val = parameter_data($string);
        } else {
            $val = $string;
        }

        if ($val == 1) {
            $temp = $temp . 'P' . ($x + 1) . ',';
        }
    }
    return $temp;
}

// Algoritma Apriori

function get_last_apriori()
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_log');
    $ci->db->where('status_proses', 0);
    $ci->db->order_by('created_proses', 'DESC');
    $query = $ci->db->get();
    return $query;
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
    $var1 = 0;
    $var2 = 0;
    $var3 = 0;
    $var4 = 0;
    $var5 = 0;

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

function insert_itemset1($id, $atribut, $jumlah, $support, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id,
        'atribut' => $atribut,
        'jumlah' => $jumlah,
        'support' => round($support, 2),
        'lolos' => $lolos,
    ];
    $ci->db->insert('tbl_itemset1', $params);
}

function insert_itemset2($id, $atribut1, $atribut2, $jumlah, $support, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id,
        'atribut1' => $atribut1,
        'atribut2' => $atribut2,
        'jumlah' => $jumlah,
        'support' => $support,
        'lolos' => $lolos,
    ];
    $ci->db->insert('tbl_itemset2', $params);
}

function insert_itemset3($id, $atribut1, $atribut2, $atribut3, $jumlah, $support, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id,
        'atribut1' => $atribut1,
        'atribut2' => $atribut2,
        'atribut3' => $atribut3,
        'jumlah' => $jumlah,
        'support' => $support,
        'lolos' => $lolos,
    ];
    $ci->db->insert('tbl_itemset', $params);
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

function get_iterasi1_byid($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset1');
    if ($id != null) {
        $ci->db->where('id_proses', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function get_iterasi2_byid($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset2');
    if ($id != null) {
        $ci->db->where('id_proses', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function proses_iterasi1($query1, $post)
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

    foreach ($query1->result() as $key => $iterasi) {

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
    }
    for ($i = 1; $i < 10; $i++) {
        if ($pert['p' . $i] != null) {
            $sup = ($pert['p' . $i] / $pert['datas_count']) * 100;
            if ($pert['p' . $i] > $post['p_support']) {
                $seleksi = 1;
            } else {
                $seleksi = 0;
            }
            insert_itemset1($post['id'], 'P' . $i, $pert['p' . $i], $sup, $seleksi);
        }
    }
}

function proses_iterasi2($query, $id)
{
    $paused = get_proses_log($id);
    $atribut = null;
    foreach (get_iterasi1_byid($id)->result() as $key => $iterasi1) {
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
            insert_itemset2($id, $datas[$i], $datas[$j], $count, $support, $lolos);
            echo $datas[$i] . ' => ' . $datas[$j] . ' : ' . $count . ' | ';
        }
        echo "<br>";
    }
}
