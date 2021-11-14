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
        <h3 class="name-doc"><strong>CETAK HASIL PERHITUNGAN ALGORITMA APRIORI</strong></h3>
    </center>

    <table class="table1">
        <tr>
            <td width="20%">Tanggal Cetak</td>
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
    </table>

    <p><strong>A. Konversi Aturan Asosiasi</strong></p>
    <table class="table1">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>X => Y</th>
                <th>Confident</th>
                <th>Korelasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $n_conf = 0;
            $count = 0;
            foreach (get_hasil_apriori($row->id_proses)->result() as $key3 => $simpulan) {
                if ($simpulan->lolos_proses_hasil == 1) {
                    $n_conf = $n_conf + $simpulan->confidence;
                    $count = $count + 1 ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <?php
                            $comb = explode(",", $simpulan->kombinasi1);
                            echo 'Jika ' . $comb[0] . ' dan ' . $simpulan->kombinasi2 . ' Maka ' . $simpulan->kombinasi2;
                            ?>
                        </td>
                        <td><?= $simpulan->confidence ?></td>
                        <td><?= $simpulan->aturan_korelasi ?></td>
                    </tr>
            <?php }
                $average_conf = $n_conf / $count;
            } ?>
        </tbody>
    </table>
    <p><strong>B. Rincian Aturan Asosiasi</strong></p>
    <table class="table1">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center">Jika</th>
                <th class="text-center">Maka</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach (get_hasil_apriori($row->id_proses)->result() as $key4 => $konversi) {
                if ($konversi->lolos_proses_hasil == 1) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <?php
                            $temp = explode(",", $konversi->kombinasi1);
                            if (count($temp) > 1) {
                                echo get_perilaku_transpost($temp[0], $row->kriteria_proses) . ' dan ' . get_perilaku_transpost($temp[1], $row->kriteria_proses);
                            } else {
                                echo get_perilaku_transpost($temp[0], $row->kriteria_proses);
                            }
                            ?>
                        </td>
                        <td><?= get_perilaku_transpost($konversi->kombinasi2, $row->kriteria_proses) ?></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <p><strong>C. Kesimpulan Aturan Asosiasi</strong></p>
    <table class="table1">
        <tr>
            <td width="30%"><b>Min. Confident</b></td>
            <td width="5%" class="text-center">:</td>
            <td><?= $row->min_confident . ' %' ?></td>
            <td width="30%"><b>Kategori Stress </b></td>
            <td width="5%" class="text-center">:</td>
            <td><?= level_stres($average_conf) ?></td>
        </tr>
        <tr>
            <td><b>Rata-Rata Confident</b></td>
            <td class="text-center">:</td>
            <td><?= round($average_conf, 2) . ' %' ?></td>
            <td><b>Total Subjek</b></td>
            <td class="text-center">:</td>
            <td><?= get_itemset_by_idproses($row->id_proses)->num_rows() . ' Responden' ?></td>

    </table>

    <?php
    if ($average_conf > 50) { ?>
        <div style="border: 1px solid;text-align: justify; color:black; margin-top:10px;padding:10px">
            <div class="card-body">
                <h3><b>Rekomendasi Hasil : </b></h3>
                <h4>Diperoleh hasil dan saran dari hasil proses perhitungan apriori. jika nilai confidencenya melebihi nilai minimal yang ditentukkan yaitu 50% sehingga mahasiswa perlu memiliki :</h4>
                <ol>
                    <li>
                        Skill belajar yang sesuai dengan diri mahasiswa masing – masing sehingga mampu belajar dengan efektif dan efisien dalam menggunakan sumber daya yang ada.
                    </li>
                    <li>
                        Time Management yaitu mahasiswa mampu memanajemen waktu sehingga apa yang dilaksanakan dapat tepat waktu dan tepat sasaran.
                    </li>
                    <li>
                        Rest yang berarti istirahat. Tubuh kita bekerja sesuai dengan pengaturan yang sudah ditentukan, hal ini berarti tiap orang memerlukan istirahat atau jeda terlebih dahulu sebelum memulai kembali aktivitas.
                    </li>
                    <li>
                        Eating and Exercise juga diperlukan karena tubuh kita memerlukan asupan yang seimbang dan latihan atau olahraga yang memadai agar dapat bugar kembali.
                    </li>
                    <li>
                        Self Talk, yang berarti percakapan kalbu yang berisi percakapan positif yang mampu membuat kita menjadi bersemangat lagi atau bahkan sering kali muncul juga percakapan negatif. Maka, kita perlu mampu secara sadar mengatur isi percakapan kita agar mendukung hal positif dari dalam diri kita khususnya dengan metode ‘stop ganti’ untuk percakapan kalbu yang negatif. Cara yang terakhir yaitu Social Support atau jaringan pendukung. Pada dasarnya manusia memang makhluk sosial yang tidak bisa hidup sendiri. Maka teman, keluarga dan kerabat diharapkan mampu menjadi Social Support
                    </li>
                </ol>
            </div>
        </div>
    <?php } else if ($average_conf < 50 && $average_conf >= 25) { ?>
        <div class="card" style="border: 1px solid;text-align: justify; color:black">
            <div class="card-body">
                <h3 class="m-0 p-0">
                    <b>Rekomendasi Hasil : </b>
                </h3>
                <h4 class="m-0 p-0 mb-2">
                    Diperoleh hasil dan saran dari hasil proses perhitungan apriori dengan Kondisi Stres Ringan maka diharapkan perlu Meningkatkan :
                </h4>
                <ol>
                    <li>Ungkapkan Keluh Kesah</li>
                    <li>Olahraga Secara Rutin</li>
                    <li>Bermeditasi</li>
                    <li>Terapkan pola hidup sehat</li>
                </ol>
            </div>
        </div>
    <?php } else { ?>
        <div class="card" style="border: 1px solid;text-align: justify; color:black">
            <div class="card-body">
                <h3 class="m-0 p-0">
                    <b>Rekomendasi Hasil : </b>
                </h3>
                <h4 class="m-0 p-0 mb-2">
                    Diperoleh hasil dan saran dari hasil proses perhitungan apriori dengan Kondisi Normal maka diharapkan perlu Memperhatikan Hal Berikut :
                </h4>
                <ol>
                    <li>Olahraga Secara Rutin</li>
                    <li>Bermeditasi</li>
                    <li>Terapkan pola hidup sehat</li>
                    <li>Fokus Terhadap hal yang dikerjakan</li>
                </ol>
            </div>
        </div>
    <?php } ?>
    </div>
</body>

</html>