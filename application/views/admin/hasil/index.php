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
                                            <td width="20%">Subjek Pengujian</td>
                                            <td width="5%">:</td>
                                            <td><?= get_fakultas()->num_rows() . ' Fakultas'  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Minimum Confident</td>
                                            <td>:</td>
                                            <td><?= $row->min_confident . ' % (Kondisi Normal)'  ?></td>
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
                                <div class="nav-wrapper">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-building mr-2"></i>Hasil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-atom mr-2"></i>Aturan Asosiasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-bullet-list-67 mr-2"></i>Konversi Asosiasi</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <strong>
                                            <span class="description">Proses Apriori Menghasilkan Nilai Confident (kepercayaan) berdasarkan masing - masing fakutas sebagai berikut : </span>
                                        </strong>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <a href="#" class="btn btn-sm btn-danger mb-2">Rincian Rata-rata Stres</a>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tabledata49">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Fakultas</th>
                                                        <th>Nama Fakultas</th>
                                                        <th>Inisialiasi</th>
                                                        <th>Responden</th>
                                                        <th>Rata-rata Stres</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach (get_fakultas()->result() as $key => $fak) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $fak->id_fakultas ?></td>
                                                            <td><?= $fak->nama_fakultas ?></td>
                                                            <td><?= inisial_string($fak->nama_fakultas) ?></td>
                                                            <td><?= get_respon_fakultas($fak->id_fakultas)->num_rows() . ' Responden' ?></td>
                                                            <td><?= get_rerata_conf_fak($row->id_proses, $fak->id_fakultas) . '% ' ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-5">
                                        <a href="#" class="btn btn-sm btn-default mb-2">Analitik Perbandingan Tingkat Stress tiap Fakultas</a>
                                    </div>
                                    <div class="col-sm-12">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <?php foreach (get_fakultas()->result() as $key => $fakultas) { ?>
                                                <div class="col-sm-12 mt-2">
                                                    <a href="#" class="btn btn-sm btn-default mb-2"><?= '(' . $fakultas->id_fakultas . ') ' . $fakultas->nama_fakultas ?></a>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tabledata<?= $key ?>">
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
                                                                $no = 1;
                                                                foreach (get_hasil_apriori($row->id_proses, $fakultas->id_fakultas)->result() as $key2 => $hasil) {
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
                                                                <?php }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <hr class="m-0 p-0 mt-3 mb-2" style="border-top: 1px solid black;">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                <div class="row">
                                    <?php
                                    $keys = 20;
                                    foreach (get_fakultas()->result() as $key => $fakultas) { ?>
                                        <div class="col-sm-6 mt-3">
                                            <a href="#" class="btn btn-sm btn-default mb-2"><?= '(' . $fakultas->id_fakultas . ') ' . $fakultas->nama_fakultas ?></a>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tabledata<?= ($keys + $key) ?>">
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
                                                        foreach (get_hasil_apriori($row->id_proses, $fakultas->id_fakultas)->result() as $key3 => $simpulan) {
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
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
$lab_fakultas = "";
$conf_fakultas = null;
foreach (get_fakultas()->result() as $key => $fakultas) {
    $fak = inisial_string($fakultas->nama_fakultas);
    $conf = get_rerata_conf_fak($row->id_proses, $fakultas->id_fakultas);

    $lab_fakultas .= "'$fak'" . ",";
    $conf_fakultas .= "$conf" . ",";
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js" integrity="sha512-O2fWHvFel3xjQSi9FyzKXWLTvnom+lOYR/AUEThL/fbP4hv1Lo5LCFCGuTXBRyKC4K4DJldg5kxptkgXAzUpvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?= $lab_fakultas ?>],
            datasets: [{
                label: 'Perbandingan Tingkat Stres',
                data: [<?= $conf_fakultas ?>],
                backgroundColor: [
                    'rgba(241, 196, 15,1.0)',
                    'rgba(44, 62, 80,1.0)',
                    'rgba(22, 160, 133,1.0)',
                    'rgba(192, 57, 43,1.0)',
                    'rgba(41, 128, 185,1.0)',
                    'rgba(34, 166, 179,1.0)'
                ],
                borderColor: [
                    'rgba(241, 196, 15,1.0)',
                    'rgba(44, 62, 80,1.0)',
                    'rgba(22, 160, 133,1.0)',
                    'rgba(192, 57, 43,1.0)',
                    'rgba(41, 128, 185,1.0)',
                    'rgba(34, 166, 179,1.0)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>