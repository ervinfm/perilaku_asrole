<?php

function login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') == NULL) {
        $ci->session->set_flashdata('login', 'Silahkan Login untuk mengakses sistem!');
        redirect('auth');
    }
}

function cek_level()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') == 1) {
        redirect('admin/dashboard');
    } else if ($ci->session->userdata('level') == 2) {
        redirect('dashboard');
    } else {
        redirect('auth/logout');
    }
}

function already_login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') != NULL) {
        $ci->session->set_flashdata('warning', 'Anda masih Login dalam sistem, <br>Silahkan Logout untuk keluar sistem!');
        cek_level();
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

function sistem()
{
    $ci = &get_instance();
    $ci->db->from('tbl_sistem');
    $query = $ci->db->get();
    return $query->row();
}

function cek_sistem_access($id, $level)
{
    $ci = &get_instance();
    if (sistem()->status_sistem == 0) {
        if ($id != sistem()->admin_sistem) {
            $ci->session->set_flashdata('warning', 'Status Sistem Saat ini adalah <strong>OFF</strong>!<br>Silahkan Coba Kembali nanti!');
            redirect('auth');
        }
    } else if (sistem()->status_sistem == 10) {
        if ($level != 1) {
            $ci->session->set_flashdata('warning', 'Status Sistem Saat ini adalah <strong>ADMIN ONLY</strong>!<br> Silahkan Coba Kembali Lagi nanti!');
            redirect('auth');
        }
    }
}

function cek_user_setting($post)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('id_user', $post['id']);
    $ci->db->where('password_user', sha1($post['s_pass']));
    $query = $ci->db->get();
    return $query;
}

function cek_email($email)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('email_user', $email);
    $query = $ci->db->get();
    return $query;
}

function cek_akativasi_akun()
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('status_user', 0);
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

function get_user_detail($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    if ($id != null) {
        $ci->db->where('id_user', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function get_user_for_sistem($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    if ($id != null) {
        $ci->db->where('id_user', $id);
    }
    $ci->db->where('level_user', 1);
    $query = $ci->db->get();
    return $query;
}

function insert_user_log($activity)
{
    $ci = &get_instance();
    $params = [
        'id_user' => $ci->session->userdata('user_id'),
        'target_user_log' => $activity,
        'device_user_log' => $ci->agent->platform() . ' | ' . $ci->agent->browser() . ' | ' . $ci->input->ip_address(),
    ];
    // $ci->db->insert('tbl_user_log', $params);
}

function get_user_log($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user_log');
    if ($id != null) {
        $ci->db->where('id_user', $id);
    }
    $ci->db->order_by('created_user_log', 'DESC');
    $query = $ci->db->get();
    return $query;
}

// Dashboard Function

function get_proses()
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_log');
    $query = $ci->db->get();
    return $query;
}

function get_last_proses()
{
    $ci = &get_instance();
    $ci->db->from('tbl_proses_log');
    $ci->db->order_by('created_proses', 'DESC');
    $query = $ci->db->get();
    return $query;
}

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

function ramah_tamah()
{
    //ambil jam dan menit
    $jam = date('H:i');

    //atur salam menggunakan IF
    if ($jam > '05:30' && $jam < '10:00') {
        $salam = 'Pagi';
    } elseif ($jam >= '10:01' && $jam < '15:00') {
        $salam = 'Siang';
    } elseif ($jam >= '15:01' && $jam < '18:00') {
        $salam = 'Sore';
    } else {
        $salam = 'Malam';
    }
    return $salam;
}

function tanggal_indo($tanggal, $cetak_hari = false)
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
        1 =>   'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agus',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function icon_matbul()
{
    //ambil jam dan menit
    $jam = date('H:i');

    //atur salam menggunakan IF
    if ($jam > '06:00' && $jam < '17:00') {
        $salam = 1;
    } else {
        $salam = 2;
    }
    return $salam;
}

// Konsultasi

function range_jawaban($name)
{
    $range = '
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio5" value="1">
            <label class="form-check-label" for="inlineRadio5">Sangat Tidak Setuju</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio4" value="2">
            <label class="form-check-label" for="inlineRadio4">Tidak Setuju</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio3" value="3">
            <label class="form-check-label" for="inlineRadio3">Netral</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio2" value="4">
            <label class="form-check-label" for="inlineRadio2">Setuju</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="' . $name . '" id="inlineRadio1" value="5">
            <label class="form-check-label" for="inlineRadio1">Sangat Setuju</label>
        </div>
    ';
    return $range;
}

function get_fakultas($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_fakultas');
    if ($id != null) {
        $ci->db->where('id_fakultas', $id);
    } else {
        $ci->db->order_by('id_fakultas', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_prodi($id_fakultas = null, $id_prodi = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_prodi');
    if ($id_prodi != null) {
        $ci->db->where('id_prodi', $id_prodi);
    } else if ($id_fakultas != null) {
        $ci->db->where('id_fakultas', $id_fakultas);
    } else {
        $ci->db->order_by('nama_prodi', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_prodi_row($id)
{
    $ci = &get_instance();
    $ci->db->from('tb_prodi');
    $ci->db->where('id_prodi', $id);

    $query = $ci->db->get();
    return $query;
}
