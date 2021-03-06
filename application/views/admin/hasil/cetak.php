<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Hasil - <?= sistem()->nama_sistem ?></title>
    <link rel="icon" href="<?= base_url() ?>assets/template/assets/img/brand/favicon.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Dosis&family=Kanit:wght@300&family=Play:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Dosis', sans-serif;
        }

        .header-title {
            font-size: 26px;
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
    <span class="header-title"><?= sistem()->nama_sistem ?></span><br>
    <span class="header-subtitle">Email : <?= sistem()->email_sistem ?></span>
    <hr class="hr-costume">

    <center>
        <h3 class="name-doc"><strong>CETAK HASIL PROSES ALGORITMA APRIORI </strong></h3>
    </center>

    <table class="table1">
        <tr>
            <td width="25%">Tanggal Cetak</td>
            <td width="3%">:</td>
            <td><?= tanggal_indo(date('Y-m-d'), TRUE) ?></td>
        </tr>
        <tr>
            <td>Rentang Dataset</td>
            <td>:</td>
            <td><?= tanggal_indo($row->date_first) . '-' . tanggal_indo($row->date_last) ?></td>
        </tr>
        <tr>
            <td>Min. Support / Confident</td>
            <td>:</td>
            <td><?= $row->min_support . ' / ' . $row->min_confident . '%' ?></td>
        </tr>
        <tr>
            <td>Kriteria Dataset</td>
            <td>:</td>
            <td><?= $row->kriteria_proses == 1 ? 'Religiusitas (Kepedulian)' : ($row->kriteria_proses == 2 ? 'Kehidupan Sosial Keluarga (Kepedulian)' : ($row->kriteria_proses == 3 ? 'Masalah Akademik (Permasalahan)' : 'Masalah Keluarga (Permasalahan)'))  ?></td>
        </tr>
        <tr>
            <td>Total Responden</td>
            <td>:</td>
            <td><?= get_dataset_bydate($row->date_first, $row->date_last)->num_rows() . ' Responden (' . get_fakultas()->num_rows() . ' fakultas)' ?></td>
        </tr>
    </table>



    <p><strong>A. Hasil Pembentukan Aturan Asosiasi</strong></p>
    <table class="table1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>X => Y</th>
                <th>Konversi</th>
                <th>Support</th>
                <th>Jumlah</th>
                <th>P(X|Y)</th>
                <th>Confident</th>
                <th>Uji Lift</th>
                <th>Korelasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach (get_fakultas()->result() as $key => $fak) { ?>
                <tr>
                    <td colspan="9"><b><?= '(' . $fak->id_fakultas . ') ' . $fak->nama_fakultas ?></b></td>
                </tr>
                <?php
                if (get_hasil_apriori($row->id_proses, $fak->id_fakultas)->num_rows() > 0) {
                    foreach (get_hasil_apriori($row->id_proses, $fak->id_fakultas)->result() as $key2 => $hasil) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $hasil->kombinasi1 . ' => ' . $hasil->kombinasi2 ?></td>
                            <td><?= 'Jika ' . $hasil->kombinasi1 . ' Maka ' . $hasil->kombinasi2 ?></td>
                            <td><?= $hasil->support_xUy ?></td>
                            <td><?= $hasil->jumlah_ab ?></td>
                            <td><?= round($hasil->pxuy, 4) ?></td>
                            <td><?= $hasil->confidence . '%' ?></td>
                            <td><?= $hasil->uji_lift ?></td>
                            <td><?= $hasil->aturan_korelasi ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="9"><i>Tidak ada Aturan Asosiasi yang tebentuk untuk fakultas ini!</i></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

    <p><strong>B. Hasil Evaluasi Pemetaan Stres</strong></p>
    <table class="table1">
        <thead>
            <th width="5%">Urutan</th>
            <th>Fakultas</th>
            <th>Stres</th>
            <th>Level</th>
            <th>Predikat</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach (get_analitik($row->id_proses)->result() as $key => $analitik) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= get_fakultas($analitik->id_fakultas)->row()->nama_fakultas ?></td>
                    <td><?= $analitik->conf_analitik . ' %' ?></td>
                    <td><?= level_stres($analitik->conf_analitik) ?></td>
                    <td><?= $analitik->predikat_analitik ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><strong>C. Rincian Aturan Asosiasi</strong></p>
    <table>
        <thead>
            <th width="5%">No</th>
            <th width="40%">X (Jika)</th>
            <th width="40%">Y (Maka)</th>
            <th>Confident</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach (get_fakultas()->result() as $key => $fak) { ?>
                <tr>
                    <td colspan="4"><b><?= '(' . $fak->id_fakultas . ') ' . $fak->nama_fakultas ?></b></td>
                </tr>
                <?php
                if (get_hasil_apriori($row->id_proses, $fak->id_fakultas)->num_rows() > 0) {
                    foreach (get_hasil_apriori($row->id_proses, $fak->id_fakultas)->result() as $key2 => $hasil) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php
                                $temp =  explode(",", $hasil->kombinasi1);
                                if (count($temp) > 1) {
                                    echo get_perilaku_transpost($temp[0], $row->kriteria_proses) . ' dan ' . get_perilaku_transpost($temp[1], $row->kriteria_proses);
                                } else {
                                    echo get_perilaku_transpost($hasil->kombinasi1, $row->kriteria_proses);
                                }
                                ?>
                            </td>
                            <td><?= get_perilaku_transpost($hasil->kombinasi2, $row->kriteria_proses) ?></td>
                            <td><?= $hasil->confidence . '%' ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="9"><i>Tidak ada Aturan Asosiasi yang tebentuk untuk fakultas ini!</i></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

    <p><strong>D. Rekomendasi Umum</strong></p>
    <table class="table1">
        <tr>
            <td align="center"><strong> Rekomendasi untuk setiap fakultas </strong></td>
        </tr>
        <tr>
            <td><?= get_rekomendasi_admin($row->kriteria_proses)->isi_rekomendasi ?></td>
        </tr>
    </table>
    <center>
        <div style="margin-top:50px;">
            <span style="font-size:14px;"><b>Yogykarta, <?= tgl_indo(date('Y-m-d')) ?></b></span><br>
            <span style="font-size:4"><b>Administrator Sistem</b></span><br><br>
            <span><i>dto</i></span><br><br>
            <span style="font-size:14px"><strong><?= profil()->nama_user ?></strong></span>
        </div>
    </center>

    <p style="margin-top:50px;margin-bottom:50;pxtext-align: justify;"><i>@<?= date('Y') ?> copytight <?= sistem()->nama_sistem ?></i></p>

</body>

</html>