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
    $ci->db->insert('tbl_konsultasi_hasil', $params);
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
            konsul_insert_itemset1($id_proses, 'P' . $i, $pert['p' . $i], $sup, $seleksi);
            // echo "P" . $i . ' => count=' . $pert['p' . $i] . ' | support=' . $sup . ' | seleksi=' . $seleksi . '<br>';
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
            konsul_insert_itemset2($proses->id_proses, $datas[$i], $datas[$j], $count, $support, $lolos);
            // echo $datas[$i] . ' => ' . $datas[$j] . ' | count : ' . $count . '| support : ' . $support . ' | lolos : ' . $lolos . '<br>';
        }
    }
}

function konsul_iterasi3($id_proses)
{
    $proses = get_konsultasi_log($id_proses)->row();
    $dataset = get_dataset_konsul($proses->id_konsultasi);
    $itemset = konsul_get_iterasi2($id_proses);
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
        // $temp_array = array($param1[$key], $param2[$key], $param3[$key]);
        // sort($temp_array);
        // $temp[$key] = $temp_array;

        $cek1 = cek_atribut_itemset3($proses->id_proses, $param1[$key], $param2[$key], $param3[$key]);
        $cek2 = cek_atribut_itemset3($proses->id_proses, $param3[$key], $param2[$key], $param1[$key]);
        $cek3 = cek_atribut_itemset3($proses->id_proses, $param2[$key], $param1[$key], $param3[$key]);
        $cek4 = cek_atribut_itemset3($proses->id_proses, $param1[$key], $param3[$key], $param2[$key]);
        $cek5 = cek_atribut_itemset3($proses->id_proses, $param3[$key], $param1[$key], $param2[$key]);
        $cek6 = cek_atribut_itemset3($proses->id_proses, $param2[$key], $param3[$key], $param1[$key]);
        if ($cek1->num_rows() == 0 && $cek2->num_rows() == 0 && $cek3->num_rows() == 0 && $cek4->num_rows() == 0 && $cek5->num_rows() == 0 && $cek6->num_rows() == 0) {
            $temp1 = $param1[$key];
            $temp2 = $param2[$key];
            $temp3 = $param3[$key];
            $count = 0;

            if (in_array($temp1, $dataset[0]) == TRUE && in_array($temp2, $dataset[0]) == TRUE && in_array($temp3, $dataset[0]) == TRUE) {
                $count = $count + 1;
            }
            if (in_array($temp1, $dataset[1]) == TRUE && in_array($temp2, $dataset[1]) == TRUE && in_array($temp3, $dataset[1]) == TRUE) {
                $count = $count + 1;
            }
            if (in_array($temp1, $dataset[2]) == TRUE && in_array($temp2, $dataset[2]) == TRUE && in_array($temp3, $dataset[2]) == TRUE) {
                $count = $count + 1;
            }
            if (in_array($temp1, $dataset[3]) == TRUE && in_array($temp2, $dataset[3]) == TRUE && in_array($temp3, $dataset[3]) == TRUE) {
                $count = $count + 1;
            }

            $support = ($count / count($dataset)) * 100;
            if ($count > $proses->min_support) {
                $seleksi = 1;
            } else {
                $seleksi = 0;
            }
            // echo $param1[$key] . ',' . $param2[$key] . '=>' . $param3[$key] . ' count : ' . $count . ' | sup: ' . $support . ' | seleksi : ' . $seleksi . '<br>';
            insert_itemset3($proses->id_proses, $param1[$key], $param2[$key], $param3[$key], $count, $support, $seleksi);
        }
    }
}

function konsul_asosiasi_hasil($id)
{
    $proses = get_konsultasi_log($id)->row();
    $dataset = get_dataset_konsul($proses->id_konsultasi);
    foreach (get_iterasi($id, '3', false)->result() as $key => $value) {
        $supxUy1 = get_support_atribut($id, 2, $value->atribut1, $value->atribut2)->row()->jumlah + get_support_atribut($id, 1, $value->atribut3)->row()->jumlah;
        $supx1 = get_support_atribut($id, 1, $value->atribut1, $value->atribut2)->row()->jumlah;
        $supxUy2 = get_support_atribut($id, 2, $value->atribut3, $value->atribut2)->row()->jumlah +  get_support_atribut($id, 1, $value->atribut1)->row()->jumlah;
        $supx2 = get_support_atribut($id, 1, $value->atribut3, $value->atribut2)->row()->jumlah;
        $supxUy3 =  get_support_atribut($id, 2, $value->atribut1, $value->atribut3)->row()->jumlah +  get_support_atribut($id, 1, $value->atribut2)->row()->jumlah;
        $supx3 =  get_support_atribut($id, 1, $value->atribut1, $value->atribut3)->row()->jumlah;

        $confident1 = ($supx1 / $supxUy1) * 100;
        $confident2 = ($supx2 / $supxUy2) * 100;
        $confident3 = ($supx3 / $supxUy3) * 100;

        $jumlahAB1 = get_support_atribut($id, 3, $value->atribut1, $value->atribut2, $value->atribut3)->num_rows();
        $jumlahA1 =  get_support_atribut($id, 2, $value->atribut1, $value->atribut2)->num_rows();
        $jumlahB1 = get_support_atribut($id, 1, $value->atribut3)->num_rows();

        $jumlahAB2 = get_support_atribut($id, 3, $value->atribut1, $value->atribut2, $value->atribut3)->num_rows();
        $jumlahA2 =  get_support_atribut($id, 2, $value->atribut3, $value->atribut2)->num_rows();
        $jumlahB2 = get_support_atribut($id, 1, $value->atribut1)->num_rows();

        $jumlahAB3 = get_support_atribut($id, 3, $value->atribut1, $value->atribut2, $value->atribut3)->num_rows();
        $jumlahA3 =  get_support_atribut($id, 2, $value->atribut1, $value->atribut3)->num_rows();
        $jumlahB3 = get_support_atribut($id, 1, $value->atribut2)->num_rows();

        $dataset_count = count($dataset);
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

        $korelasi_1 = korelasi_uji_lift($PaUb1);
        $korelasi_2 = korelasi_uji_lift($PaUb2);
        $korelasi_3 = korelasi_uji_lift($PaUb3);

        $iterasi = 3;
        $lolos_1 = ($confident1 > $proses->min_confident ? 1 : 0);
        $lolos_2 = ($confident2 > $proses->min_confident ? 1 : 0);
        $lolos_3 = ($confident3 > $proses->min_confident ? 1 : 0);


        insert_konsul_hasil($proses->id_proses, ($value->atribut1 . ',' . $value->atribut2), $value->atribut3, $supxUy1, $supx1, $confident1, $jumlahA1, $jumlahB1, $jumlahAB1, $pA1, $pB1, $pAB1, $PaUb1, $korelasi_1, $iterasi, $lolos_1);
        insert_konsul_hasil($proses->id_proses, ($value->atribut3 . ',' . $value->atribut2), $value->atribut1, $supxUy2, $supx2, $confident2, $jumlahA2, $jumlahA2, $jumlahAB2, $pA2, $pB2, $pAB2, $PaUb2, $korelasi_2, $iterasi, $lolos_2);
        insert_konsul_hasil($proses->id_proses, ($value->atribut1 . ',' . $value->atribut3), $value->atribut2, $supxUy3, $supx3, $confident3, $jumlahA3, $jumlahA3, $jumlahAB3, $pA3, $pB3, $pAB3, $PaUb3, $korelasi_3, $iterasi, $lolos_3);
        // // OutpuA1$pA1
        // echo $value->atribut1 . ',' . $value->atribut2 . ' => ' . $value->atribut3 . ' (' .  $supx1 . ' / ' . $supxUy1 . ' | confident = ' . $confident1 . ' | Lift = ' . $PaUb1 . ' | ' . $korelasi_1 . ')<br>';
        // echo $value->atribut3 . ',' . $value->atribut2 . ' => ' . $value->atribut1 . ' (' .  $supx2 . ' / ' . $supxUy2 . ' | confident = ' . $confident2 . ' | Lift = ' . $PaUb2 . ' | ' . $korelasi_2 . ')<br>';
        // echo $value->atribut1 . ',' . $value->atribut3 . ' => ' . $value->atribut2 . ' (' .  $supx3 . ' / ' . $supxUy3 . ' | confident = ' . $confident3 . ' | Lift = ' . $PaUb3 . ' | ' . $korelasi_3 . ')<br>';
    }
}

function get_konsultasi_hasil($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_konsultasi_hasil');
    $ci->db->where('id_proses', $id);
    $query = $ci->db->get();
    return $query;
}

function get_last_konsul()
{
    $ci = &get_instance();
    $ci->db->from('tbl_konsultasi_log');
    $ci->db->where('author_proses', $ci->session->userdata('user_id'));
    $ci->db->order_by('created_proses', 'DESC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    return $query->row();
}

function update_status_proses($id_proses)
{
    $ci = &get_instance();
    $params['status_proses'] = 1;
    $ci->db->where('id_proses', $id_proses);
    $ci->db->update('tbl_konsultasi_log', $params);
}

function get_konsultasi_history_user()
{
    $ci = &get_instance();
    $ci->db->from('tbl_konsultasi_log');
    $ci->db->where('author_proses', $ci->session->userdata('user_id'));
    $query = $ci->db->get();
    return $query;
}
