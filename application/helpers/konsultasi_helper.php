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

function get_konsultasi_log($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_konsultasi_log');
    $ci->db->where('author_proses', $ci->session->userdata('user_id'));
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query;
}

function get_konsultasi($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_konsultasi');
    $ci->db->where('id_konsultasi', $id);
    $query = $ci->db->get();
    return $query;
}

function get_dataset_konsul($id_konsul)
{
    $datas = get_konsultasi($id_konsul)->row();
    $data[0] = explode(",", $datas->params1_konsultasi);
    $data[1] = explode(",", $datas->params2_konsultasi);
    $data[2] = explode(",", $datas->params3_konsultasi);
    $data[3] = explode(",", $datas->params4_konsultasi);
    return $data;
}

function konsul_get_iterasi1($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset1');
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query;
}

function konsul_get_iterasi2($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_itemset2');
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query;
}

function konsul_insert_itemset1($id, $atribut, $jumlah, $support, $lolos)
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

function konsul_insert_itemset2($id, $atribut1, $atribut2, $jumlah, $support, $lolos)
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

function konsul_insert_itemset3($id, $atribut1, $atribut2, $atribut3, $jumlah, $support, $lolos)
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
    $ci->db->insert('tbl_itemset3', $params);
}

function insert_konsul_hasil($id_proses, $kombinasi1, $kombinasi2, $sup_xUy, $sup_x, $conf, $n_a, $n_b, $n_ab, $px, $py, $pxuy, $lift, $korelasi, $iterasi, $lolos)
{
    $ci = &get_instance();
    $params = [
        'id_proses' => $id_proses,
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

function konsul_iterasi1($id_proses)
{
    $pert = [
        'p1' => 0,
        'p2' => 0,
        'p3' => 0,
        'p4' => 0,
        'p5' => 0,
        'datas_count' => null,
        'seleksi' => null,
    ];

    $proses = get_konsultasi_log($id_proses)->row();
    $iterasi1 = get_konsultasi($proses->id_konsultasi)->row();
    $temp = $iterasi1->params1_konsultasi . ',' . $iterasi1->params2_konsultasi . ',' . $iterasi1->params3_konsultasi . ',' . $iterasi1->params3_konsultasi;
    $data = explode(",", $temp);

    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == 'P1') {
            $pert['p1'] = $pert['p1'] + 1;
        } else if ($data[$i] == 'P2') {
            $pert['p2'] = $pert['p2'] + 1;
        } else if ($data[$i] == 'P3') {
            $pert['p3'] = $pert['p3'] + 1;
        } else if ($data[$i] == 'P4') {
            $pert['p4'] = $pert['p4'] + 1;
        } else if ($data[$i] == 'P5') {
            $pert['p5'] = $pert['p5'] + 1;
        }
    }

    $pert['datas_count'] = 5;
    for ($i = 1; $i < 6; $i++) {
        if ($pert['p' . $i] != null) {
            $sup = ($pert['p' . $i] / $pert['datas_count']) * 100;
            if ($pert['p' . $i] > $proses->min_support) {
                $seleksi = 1;
            } else {
                $seleksi = 0;
            }
            // konsul_insert_itemset1($id_proses, 'P' . $i, $pert['p' . $i], $sup, $seleksi);
            echo "P" . $i . ' => count=' . $pert['p' . $i] . ' | support=' . $sup . ' | seleksi=' . $seleksi . '<br>';
        }
    }
}

function konsul_iterasi2($id_proses)
{
    $proses = get_konsultasi_log($id_proses)->row();
    $dataset = get_dataset_konsul($proses->id_konsultasi);

    $temp = konsul_get_iterasi1($id_proses);
    $atribut = null;
    foreach ($temp->result() as $key => $iterasi2) {
        if ($iterasi2->lolos == 1) {
            $atribut = $atribut . ',' . $iterasi2->atribut;
        }
    }

    $datas = explode(",", $atribut);
    for ($i = 1; $i < count($datas); $i++) {
        for ($j = $i + 1; $j <  count($datas); $j++) {
            $count = 0;
            if (in_array($datas[$i], $dataset[0]) && in_array($datas[$j], $dataset[0])) {
                $count = $count + 1;
            }
            if (in_array($datas[$i], $dataset[1]) && in_array($datas[$j], $dataset[1])) {
                $count = $count + 1;
            }
            if (in_array($datas[$i], $dataset[2]) && in_array($datas[$j], $dataset[2])) {
                $count = $count + 1;
            }
            if (in_array($datas[$i], $dataset[3]) && in_array($datas[$j], $dataset[3])) {
                $count = $count + 1;
            }

            $support = ($count / 4) * 100;
            if ($count > $proses->min_support) {
                $lolos = 1;
            } else {
                $lolos = 0;
            }
            // konsul_insert_itemset2($proses->id_proses, $datas[$i], $datas[$j], $count, $support, $lolos);
            echo $datas[$i] . ' => ' . $datas[$j] . ' | count : ' . $count . '| support : ' . $support . ' | lolos : ' . $lolos . '<br>';
        }
    }
}

function konsul_iterasi3($id_proses)
{
    $proses = get_konsultasi_log($id_proses)->row();
    $dataset = get_dataset_konsul($proses->id_konsultasi);

    $temp = konsul_get_iterasi2($id_proses);
    $atribut = null;
    foreach ($temp->result() as $key => $iterasi3) {
        if ($iterasi3->lolos == 1) {
            $data = array($iterasi3->atribut1, $iterasi3->atribut2);
            foreach ($temp->result() as $key1 => $value2) {
                if ($iterasi3->lolos == 1) {
                    if (!in_array($value2->atribut1, $data)) {
                        $param1[$key] = $iterasi3->atribut1;
                        $param2[$key] = $iterasi3->atribut2;
                        $param3[$key] = $value2->atribut1;
                    } else if (!in_array($value2->atribut2, $data)) {
                        $param1[$key] = $iterasi3->atribut1;
                        $param2[$key] = $iterasi3->atribut2;
                        $param3[$key] = $value2->atribut2;
                    }
                }
            }
        }
        $count[$key] = $support[$key] = $lolos[$key] = 0;
        $atribut = $param1[$key] . ',' . $param2[$key] . ',' . $param3[$key];
        $datas = explode(",", $atribut);
        for ($i = 0; $i < count($datas); $i++) {
            // $count = 0;
            if (in_array($datas[$i], $dataset[0]) && in_array($datas[$i + 1], $dataset[0]) && in_array($datas[$i + 2], $dataset[0])) {
                $count[$key]++;
            }
            if (in_array($datas[$i], $dataset[1]) && in_array($datas[$i + 1], $dataset[1]) && in_array($datas[$i + 2], $dataset[1])) {
                $count[$key]++;
            }
            if (in_array($datas[$i], $dataset[2]) && in_array($datas[$i + 1], $dataset[2]) && in_array($datas[$i + 2], $dataset[2])) {
                $count[$key]++;
            }
            if (in_array($datas[$i], $dataset[3]) && in_array($datas[$i + 1], $dataset[3]) && in_array($datas[$i + 2], $dataset[3])) {
                $count[$key]++;
            }
        }
        $support[$key] = ($count[$key] / 4) * 100;
        if ($count[$key] > $proses->min_support) {
            $lolos[$key] = 1;
        } else {
            $lolos = 0;
        }
        // konsul_insert_itemset3($proses->id_proses, $param1[$key], $param2[$key], $param3[$key], $count[$key], $support[$key], $lolos[$key]);
        echo $param1[$key] . ',' . $param2[$key] . ' => ' . $param3[$key] . '| count : ' . $count[$key]  . '| support : ' . $support[$key] . ' | lolos : ' . $lolos[$key] . '<br>';
    }
}
