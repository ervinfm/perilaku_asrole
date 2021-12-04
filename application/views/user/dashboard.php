<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row pt-4">
                <div class="col-lg-6 ">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">Log</a>
                    <a href="#" class="btn btn-sm btn-neutral">Report</a>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-sm-2 offset-sm-2">
                    <a href="<?= site_url('konsultasi') ?>">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Konsultasi</h5>
                                        <span class="h4 font-weight-bold mb-0">Perilaku</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Terakhir Digunakan</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="<?= site_url('hasil') ?>">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Hasil</h5>
                                        <span class="h4 font-weight-bold mb-0">Konsultasi</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Terakhir Digunakan</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="<?= site_url('riwayat') ?>">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Riwayat</h5>
                                        <span class="h4 font-weight-bold mb-0">Konsultasi</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-calendar-alt"></i> <?= date('d/m/Y') ?></span>
                                    <span class="text-nowrap">Terakhir Digunakan</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="<?= site_url('kondisi') ?>">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Kondisi</h5>
                                        <span class="h4 font-weight-bold mb-0">Terkini</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Terakhir Digunakan</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-6 offset-sm-3">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                            <h5 class="h3 text-white mb-0">Konsultasi Perilaku</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Kondisi</th>
                                    <th scope="col" class="sort" data-sort="budget">Stres</th>
                                    <th scope="col" class="sort" data-sort="status">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                $no = 1;
                                foreach (get_dashboard_konsultasi()->result() as $key => $log) {
                                    $conf = 0;
                                    foreach (get_dashboard_konsul_hasil($log->id_proses)->result() as $key => $logs) {
                                        $conf += $logs->confidence;
                                    }
                                    $conf = round($conf / get_dashboard_konsul_hasil($log->id_proses)->num_rows(), 2);
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3" style="font-size:40px">
                                                    <?php
                                                    if ($conf >= 75) { ?>
                                                        <i class="fa fa-angry" style="color:#192a56"></i>
                                                    <?php } else if ($conf < 75 && $conf >= 50) { ?>
                                                        <i class="fa fa-frown" style="color:#192a56"></i>
                                                    <?php } else if ($conf < 50 && $conf >= 25) { ?>
                                                        <i class="fa fa-meh" style="color:#192a56"></i>
                                                    <?php } else if ($conf < 25) { ?>
                                                        <i class="fa fa-grin" style="color:#192a56"></i>
                                                    <?php } ?>
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?= level_stres($conf) ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            <?= $conf ?>
                                        </td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($log->created_proses))) . ' ' . date('H:i', strtotime($log->created_proses)) ?></td>
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