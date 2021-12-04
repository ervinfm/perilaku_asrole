<?php
$min = array();
foreach (get_konsultasi_hasil($row->id_proses)->result() as $key => $term) {
    array_push($min, $term->confidence);
}
$min_conf = min($min);

?>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row pt-4">
                <div class="col-lg-6 ">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#"><?= ucfirst($this->uri->segment(1)) ?></a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="<?= site_url('dashboard') ?>" class="btn btn-sm btn-neutral"><i class="fas fa-home"></i> Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h2 text-white mb-0">Detail Konsultasi Perilaku Mahasiswa</h5>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0">
                                    <a href="<?= site_url('riwayat') ?>" class="btn btn-sm btn-neutral"><i class="fas fa-history"></i> Riwayat Konsultasi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="h3 m-0 text-white">A. Deskripsi Konsultasi</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-bordered text-white mt-2">
                                        <tr>
                                            <td width="30%">ID Konsultasi</td>
                                            <td width="5%">:</td>
                                            <td><?= $row->id_konsultasi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Konsultasi</td>
                                            <td>:</td>
                                            <td><?= tanggal_indo(date('Y-m-d', strtotime($row->created_proses))) . ' ' . date('H:i:s', strtotime($row->created_proses)) ?></td>
                                        </tr>
                                        <tr>
                                            <td>ID Clien</td>
                                            <td>:</td>
                                            <td><?= profil()->nim_user ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-bordered text-white mt-2">
                                        <tr>
                                            <td>Nama Clien</td>
                                            <td>:</td>
                                            <td><?= profil()->nama_user ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fakultas</td>
                                            <td>:</td>
                                            <td><?= get_fakultas(profil()->id_fakultas)->row()->nama_fakultas ?></td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi</td>
                                            <td>:</td>
                                            <td><?= get_prodi_row(profil()->id_prodi)->row()->nama_prodi ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <span class="h3 m-0 text-white">B. Aturan Asosiasi</span>
                            <table class="table table-bordered text-white mt-2">
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
                                                <td><?= $hasil->confidence . ' %' ?></td>
                                                <td><?= $hasil->uji_lift ?></td>
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
                                    <span class="h3 m-0 text-white">C. Rekomendasi Konsultasi</span>
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