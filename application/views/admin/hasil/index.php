<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body"></div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class=" col ">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1> Hasil Association Rule Mining</h1>
                        </div>
                        <div class="col-sm-6">
                            <?php if (get_last_apriori()->num_rows() == 0) { ?>
                                <a href="<?= site_url('admin/hasil/cetak/' . $row->id_proses) ?>" class="btn btn-default float-right btn-sm" target="_blank"><i class="ni ni-paper-diploma"></i> Cetak Hasil</a>
                                <a href="<?= site_url('admin/hasil/detail/' . $row->id_proses) ?>" class="btn btn-primary float-right btn-sm mr-2"><i class="ni ni-badge"></i> Lihat Detail</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if (get_last_apriori()->num_rows() > 0) { ?>
                            <div class="col-sm-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Perhatian!</strong> Gagal Menampilkan hasil!, Silahkan Simpan Hasil Proses Apriori terlebih dahulu!
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">

                                        <tr>
                                            <td>ID Proses</td>
                                            <td>:</td>
                                            <td><?= $row->id_proses  ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Rentang Tanggal</td>
                                            <td width="5%">:</td>
                                            <td><?= date('d M Y', strtotime($row->date_first)) . ' - ' . date('d M Y', strtotime($row->date_last)) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria</td>
                                            <td>:</td>
                                            <td><?= $row->kriteria_proses == 1 ? 'Religiusitas' : ($row->kriteria_proses == 2 ? 'Kehidupan Sosial Keluarga' : ($row->kriteria_proses == 3 ? 'Masalah Akademik' : 'Masalah Keluarga'))  ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="20%">Minimum Support</td>
                                            <td width="5%">:</td>
                                            <td><?= $row->min_support  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Minimum Confident</td>
                                            <td>:</td>
                                            <td><?= $row->min_confident . ' %'  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Proses</td>
                                            <td>:</td>
                                            <td><b>SIMPAN DATA HASIL</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <a href="<?= site_url('admin/apriori/hasil/' . $row->id_proses) ?>" class="btn btn-default float-right"><i class="fa fa-share-square"></i> Simpan Hasil Proses Apriori</a>
                            </div>
                        <?php } else { ?>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">

                                        <tr>
                                            <td>ID Proses</td>
                                            <td>:</td>
                                            <td><?= $row->id_proses  ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Rentang Tanggal</td>
                                            <td width="5%">:</td>
                                            <td><?= date('d M Y', strtotime($row->date_first)) . ' - ' . date('d M Y', strtotime($row->date_last)) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Proses</td>
                                            <td>:</td>
                                            <td><?= tgl_indo(date('Y-m-d', strtotime($row->created_proses)), TRUE) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Kriteria</td>
                                            <td>:</td>
                                            <td><?= $row->kriteria_proses == 1 ? 'Religiusitas' : ($row->kriteria_proses == 2 ? 'Kehidupan Sosial Keluarga' : ($row->kriteria_proses == 3 ? 'Masalah Akademik' : 'Masalah Keluarga'))  ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Minimum Support</td>
                                            <td width="5%">:</td>
                                            <td><?= $row->min_support  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Minimum Confident</td>
                                            <td>:</td>
                                            <td><?= $row->min_confident . ' %'  ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if (get_last_apriori()->num_rows() == 0) { ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-sm btn-success text-white mb-3"><i class="ni ni-atom"></i> Aturan Asosiasi Lolos</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <!-- id="tabledata" -->
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>X => Y</th>
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
                                            if (get_hasil_apriori($row->id_proses)->num_rows() > 0) {
                                                $no = 1;
                                                foreach (get_hasil_apriori($row->id_proses)->result() as $key2 => $hasil) {
                                                    if ($hasil->lolos_proses_hasil == 1) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $hasil->kombinasi1 . ' => ' . $hasil->kombinasi2 ?></td>
                                                            <td><?= $hasil->support_xUy ?></td>
                                                            <td><?= $hasil->jumlah_ab ?></td>
                                                            <td><?= round($hasil->pxuy, 4) ?></td>
                                                            <td><?= $hasil->confidence . '%' ?></td>
                                                            <td><?= $hasil->uji_lift ?></td>
                                                            <td><?= $hasil->aturan_korelasi ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="alert alert-danger" role="alert">
                                                            <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                                            <span class="alert-text"><strong>Gagal!</strong> Proses Mining Gagal dan Tidak Menghasilkan Aturan Asosiasi!</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <a class="btn btn-sm btn-info text-white mb-3"><i class="ni ni-notification-70"></i> Konversi Asosiasi Lolos</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabledata">
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
                                                            echo 'Jika ' . $comb[0] . ' dan ' . $comb[1] . ' Maka ' . $simpulan->kombinasi2;
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
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <a class="btn btn-sm btn-primary text-white mb-3"><i class="fa fa-info-circle"></i> Rincian Konversi</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-sm btn-default text-white mb-3"><i class="ni ni-collection"></i> Kesimpulan Asosiasi</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td width="30%"><b>Min. Confident</b></td>
                                                <td width="5%" class="text-center">:</td>
                                                <td><?= $row->min_confident . ' %' ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Rata-Rata Confident</b></td>
                                                <td class="text-center">:</td>
                                                <td><?= round($average_conf, 2) . ' %' ?></td>
                                            </tr>
                                        </table>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td width="30%"><b>Kategori Stress </b></td>
                                                <td width="5%" class="text-center">:</td>
                                                <td><?= level_stres($average_conf) ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Subjek</b></td>
                                                <td class="text-center">:</td>
                                                <td><?= get_itemset_by_idproses($row->id_proses)->num_rows() . ' Responden' ?></td>
                                            </tr>
                                        </table>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <?php
                                if ($average_conf > 50) { ?>
                                    <div class="card" style="border: 1px solid;text-align: justify; color:black">
                                        <div class="card-body">
                                            <h3 class="m-0 p-0">
                                                <b>Rekomendasi Hasil : </b>
                                            </h3>
                                            <h4 class="m-0 p-0 mb-2">
                                                Diperoleh hasil dan saran dari hasil proses perhitungan apriori. jika nilai confidencenya melebihi nilai minimal yang ditentukkan yaitu 50% sehingga mahasiswa perlu memiliki :
                                            </h4>
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
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>