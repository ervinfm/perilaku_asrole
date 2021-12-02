<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Konsultasi - <?= sistem()->nama_sistem ?></title>
    <link rel="icon" href="<?= base_url() ?>assets/template/assets/img/brand/favicon.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Dosis&family=Kanit:wght@300&family=Play:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Dosis', sans-serif;
        }

        .header-title {
            font-size: 22px;
            font-family: 'Kanit', sans-serif;
            font-weight: bold;
        }

        .header-subtitle {
            font-size: 20px;
            font-family: 'Play', sans-serif;
        }

        .hr-costume {
            border: 1px solid black;
        }

        .table1 {
            font-family: sans-serif;
            font-size: 12px;
            color: #232323;
            border-collapse: collapse;
        }

        .table1,
        th,
        td {
            border: 1px solid #999;
            padding: 8px 20px;
        }

        .name-doc {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    $min = array();
    foreach (get_konsultasi_hasil($row->id_proses)->result() as $key => $term) {
        array_push($min, $term->confidence);
    }
    $min_conf = min($min);

    ?>
    <span class="header-title"><?= sistem()->nama_sistem ?></span><br>
    <span class="header-subtitle">Email : <?= sistem()->email_sistem ?></span>
    <hr class="hr-costume">

    <center>
        <h3 class="name-doc"><strong> HASIL KONSULTASI PERILAKU </strong></h3>
    </center>

    <table class="table1" width="99%">
        <tr>
            <td width="20%">Tanggal Cetak</td>
            <td width="3%">:</td>
            <td><?= tanggal_indo(date('Y-m-d'), TRUE) ?></td>
        </tr>
        <tr>
            <td>ID Konsultasi</td>
            <td>:</td>
            <td><?= $row->id_konsultasi ?></td>
        </tr>
        <tr>
            <td>Nama Clien</td>
            <td>:</td>
            <td><?= profil()->nama_user ?></td>
        </tr>
        <tr>
            <td>Tingkat Stress</td>
            <td>:</td>
            <td><?= $min_conf . ' %' ?></td>
        </tr>
    </table>

    <table class="table1" width="99%" style="margin-top:30px">
        <tr>
            <td width="20%">Diagnosa Konsultasi</td>
            <td width="2%"> : </td>
            <td> Saudara/i <strong><?= profil()->nama_user ?></strong> dapat disimpulkan sedang dalam keadaan <strong>(<?= strtoupper(level_stres($min_conf)) ?>)</strong> dengan Persentase <strong><?= $min_conf . '%' ?></strong> </td>
        </tr>
        <tr>
            <td width="20%">Rekomendasi Konsultasi</td>
            <td width="2%"> : </td>
            <td>
                <?php if ($min_conf > 75) { ?>
                    <li>Konsultasi dengan psikolog/psikiater</li>
                    <li>Mendekatkan diri pada Allah dengan melalui konsultasi dengan ahli agama</li>
                <?php } else if ($min_conf <= 75 && $min_conf > 50) { ?>
                    <li>Problem fokus Coping /memecahkan masalah dengan menganggap problem itu sesuatu yang ringan mudah/ bisa dipecahkan</li>
                    <li>Menguatkan psikis kita dengan membaca buku" agama/motivasi</li>
                <?php } else if ($min_conf <= 50 && $min_conf > 25) { ?>
                    <li>Relaksasi </li>
                    <li>Istirahat dan mengalihkan kegiatan ke hal" yang positif bagian sosial, spiritual dan sebagainya</li>
                    <li>Tolking cure /writing cure memecahkan problem dengan menulis problemnya dengan mengungkapkan kepada orang lain yg dipercaya</li>
                <?php } else { ?>
                    <li>Menjaga Kestabilan Emosi</li>
                    <li>Berolahraga teratur dan Makanan Bergizi</li>
                    <li>Terapkan pola hidup sehat</li>
                <?php } ?>
            </td>
        </tr>
    </table>

    <div style="margin-top:30px">
        <span style="font-size:12px"> Yogyakarta, <?= tanggal_indo(date('Y-m-d')) ?> </span><br>
        <span style="font-size:12px"> <?= sistem()->nama_sistem ?></span>
    </div>
</body>

</html>