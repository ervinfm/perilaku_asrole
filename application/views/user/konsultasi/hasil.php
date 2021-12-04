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
                            <h5 class="h2 text-white mb-0">Proses Konsultasi Perilaku Mahasiswa</h5>
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
                <div class="card-body text-white">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success" role="alert">
                                <strong>Berhasil!</strong> Proses Konsultasi Perilaku Berhasil !
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <table class="table table-bordered text-white">
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
                                    <td>Nama Clien</td>
                                    <td>:</td>
                                    <td><?= profil()->nama_user ?></td>
                                </tr>
                                <tr>
                                    <td>Proses Konsultasi</td>
                                    <td>:</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>Status Konsultasi</td>
                                    <td>:</td>
                                    <td>Selesai</td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-sm-7">
                            <table class="table table-bordered text-white">
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
                            <div class="col-sm-12">
                                <a href="<?= site_url('hasil') ?>" class="btn btn-info mt-5"><i class="ni ni-briefcase-24"></i> Rekomendasi Konsultasi </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>