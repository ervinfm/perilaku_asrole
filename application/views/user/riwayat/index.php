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
                            <h5 class="h2 text-white mb-0">Riwayat Konsultasi Perilaku Mahasiswa</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tabledata">
                                            <thead>
                                                <tr>
                                                    <th width="3%">No</th>
                                                    <th>ID Konsultasi</th>
                                                    <th>Tanggal Konsultasi</th>
                                                    <th>Tingkat Stress</th>
                                                    <th>Status</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($row->result() as $key => $data) {
                                                    $min = array();
                                                    foreach (get_konsultasi_hasil($data->id_proses)->result() as $key => $term) {
                                                        array_push($min, $term->confidence);
                                                    }
                                                    $min_conf = min($min);
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->id_konsultasi ?></td>
                                                        <td><?= tanggal_indo(date('Y-m-d', strtotime($data->created_proses))) . ' ' . date('H:i:s', strtotime($data->created_proses)) ?></td>
                                                        <td><?= $min_conf . ' %' . '   (+' . ($min_conf - 25) . ')' ?></td>
                                                        <td><?= level_stres($min_conf) ?></td>
                                                        <td>
                                                            <a href="<?= site_url('riwayat/detail/' . $data->id_proses) ?>" class="btn btn-info btn-sm rounded-circle" title="Detail"><i class="fa fa-info-circle"></i></a>
                                                            <a href="<?= site_url('riwayat/cetak/' . $data->id_proses) ?>" target="_blank" class="btn btn-warning btn-sm rounded-circle" title="Cetak"><i class="fa fa-print"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
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