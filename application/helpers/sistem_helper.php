<?php

function login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') == NULL) {
        $ci->session->set_flashdata('login', 'Silahkan Login untuk mengakses sistem!');
        redirect('auth');
    }
}

function already_login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') != NULL) {
        $ci->session->set_flashdata('warning', 'Anda masih Login dalam sistem, <br>Silahkan Logout untuk keluar sistem!');
        redirect('dashboard');
    }
}

function profil()
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('id_user', $ci->session->userdata('user_id'));
    $query = $ci->db->get();
    return $query->row();
}

function cek_email($email)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('email_user', $email);
    $query = $ci->db->get();
    return $query;
}

function smtp_email($post)
{ # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?] 
    $ci = &get_instance();
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'mabes.develover@gmail.com',  // Email gmail
        'smtp_pass'   => 'mabes@group17',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];

    // Load library email dan konfigurasinya
    $ci->load->library('email', $config);

    // Email dan nama pengirim
    $ci->email->from('no-reply@mabesgroup.com', 'Mabes Industries Bot');

    // Email penerima
    $ci->email->to($post['destination']); // Ganti dengan email tujuan

    // Subject email
    $ci->email->subject($post['subject']);

    // Isi email
    $ci->email->message($post['massage']);

    // Tampilkan pesan sukses atau error
    if ($ci->email->send()) {
        return 1;
    } else {
        return 0;
    }
}

function tgl_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function get_user($val, $cat)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    if ($cat == 1) {
        $ci->db->where('email_user', $val);
    } else if ($cat == 2) {
        $ci->db->where('username_user', $val);
    }
    $query = $ci->db->get();
    return $query;
}

// Dashboard Function
function get_dataset()
{
    $ci = &get_instance();
    $ci->db->from('tbl_dataset');
    $query = $ci->db->get();
    return $query;
}

function get_update_dataset()
{
    $ci = &get_instance();
    $ci->db->from('tbl_dataset');
    $ci->db->group_by('created_dataset');
    $ci->db->order_by('created_dataset', 'DESC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    return $query->row();
}

function get_count_user()
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $query = $ci->db->get();
    return $query;
}

function get_update_user()
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->order_by('created_user', 'DESC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    return $query->row();
}

// Preprocessing Dataset
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

function parameter_data($data)
{
    switch ($data) {
        case 0:
            return "STS";
            break;
        case 1:
            return "TS";
            break;
        case 2:
            return "N";
            break;
        case 3:
            return "N";
            break;
        case 4:
            return "S";
            break;
        case 5:
            return "SS";
            break;
        default:
            return "undifined";
            break;
    }
}

function transformation_data($data)
{
    $datas = explode(",", $data);
    foreach ($datas as $x => $x_value) {
        echo parameter_data($x_value) . '|';
    }
}

// Konsultasi

function range_jawaban($name)
{
    $range = '
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio5" value="option5">
            <label class="form-check-label" for="inlineRadio5">Sangat Tidak Setuju</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio4" value="option4">
            <label class="form-check-label" for="inlineRadio4">Tidak Setuju</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio3" value="option3">
            <label class="form-check-label" for="inlineRadio3">Netral</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Setuju</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Sangat Setuju</label>
        </div>
    ';
    return $range;
}
