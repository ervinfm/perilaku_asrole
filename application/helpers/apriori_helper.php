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
        'support' => $support,
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
    $ci->db->insert('tbl_itemset', $params);
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
