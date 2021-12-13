<?php
$min = array();
foreach (get_konsultasi_hasil($row->id_proses)->result() as $key => $term) {
    array_push($min, $term->confidence);
}
$min_conf = min($min);
?>

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
                        <div class="col-sm-8">
                            <h1> Riwayat Association Rule Mining</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-bordered  mt-2">
                                        <tr>
                                            <td width="30%">ID Konsultasi</td>
                                            <td width="5%">:</td>
                                            <td><?= $row->id_proses ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Konsultasi</td>
                                            <td>:</td>
                                            <td><?= tanggal_indo(date('Y-m-d', strtotime($row->created_proses))) . ' ' . date('H:i:s', strtotime($row->created_proses)) ?></td>
                                        </tr>
                                        <tr>
                                            <td>ID Clien</td>
                                            <td>:</td>
                                            <td><?= get_user_detail($row->author_proses)->row()->nim_user ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-bordered  mt-2">
                                        <tr>
                                            <td>Nama Clien</td>
                                            <td>:</td>
                                            <td><?= get_user_detail($row->author_proses)->row()->nama_user ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fakultas</td>
                                            <td>:</td>
                                            <td><?= get_fakultas(get_user_detail($row->author_proses)->row()->id_fakultas)->row()->nama_fakultas ?></td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi</td>
                                            <td>:</td>
                                            <td><?= get_prodi_row(get_user_detail($row->author_proses)->row()->id_prodi)->row()->nama_prodi ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <span class="h3 m-0">Aturan Asosiasi</span>
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Kombinasi Premis</th>
                                        <th width="10%">Confident</th>
                                        <th>Uji Lift</th>
                                        <th>Korelasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach (get_konsultasi_hasil($row->id_proses)->result() as $key => $hasil) {
                                        if ($hasil->confidence == $min_conf) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $hasil->kombinasi1 . ' => ' . $hasil->kombinasi2 ?></td>
                                                <td><?= round($hasil->confidence, 2) . ' %' ?></td>
                                                <td><?= round($hasil->uji_lift, 2) ?></td>
                                                <td><?= $hasil->aturan_korelasi ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="h3 m-0 ">Rekomendasi Konsultasi</span>
                                </div>
                                <div class="col-sm-2 mt-4">
                                    <div class="card ">
                                        <div class="card-body">
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td class="text-center" style="font-size: 80px;">
                                                        <?php
                                                        if ($min_conf >= 75) { ?>
                                                            <i class="fa fa-angry" style="color:#192a56"></i>
                                                        <?php } else if ($min_conf < 75 && $min_conf >= 50) { ?>
                                                            <i class="fa fa-frown" style="color:#192a56"></i>
                                                        <?php } else if ($min_conf < 50 && $min_conf >= 25) { ?>
                                                            <i class="fa fa-meh" style="color:#192a56"></i>
                                                        <?php } else if ($min_conf < 25) { ?>
                                                            <i class="fa fa-grin" style="color:#192a56"></i>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="font-family: 'Orbitron', sans-serif; font-size:20px">Stres : <?= round($min_conf, 2) . '%' ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="font-family: 'Orbitron', sans-serif; font-size:13px"> + <?= round($min_conf, 2) - 25 ?> Normal</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span class="h3 m-o"> Rekomendasi Konsultasi </span>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <table class="table">
                                                        <tr>
                                                            <td width="10%">Hasil Konsultasi </td>
                                                            <td width="5%">:</td>
                                                            <td><?= level_stres($min_conf) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rekomendasi Tindakan</td>
                                                            <td>:</td>
                                                            <td><?= get_rekomendasi_user($min_conf) ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>