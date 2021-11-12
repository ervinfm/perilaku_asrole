<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-sm-9 mt-0">
                    <div class="alert alert-default" role="alert" style="font-size:20px;opacity:0.9">
                        <strong>Selamat <?= ramah_tamah() ?>! </strong> <small>Sdr/i. <?= profil()->nama_user ?> (Administrator)</small>
                    </div>
                </div>
                <div class="col-lg-3 text-center mt-3">
                    <div class="card" style="background-color: rgba(255,255,255,0.2); border : 1px grey">
                        <div class="row">
                            <div class="col-sm-12" style="opacity: 1; color:#FFF">
                                <table width="100%" border="0">
                                    <tr>
                                        <td style="font-size:40px" rowspan="2">
                                            <?php if (icon_matbul() == 1) { ?>
                                                <span class="float-right"><i class="fa fa-sun"></i></span>
                                            <?php } else { ?>
                                                <span class="float-right"><i class="fa fa-moon"></i></span>
                                            <?php } ?>
                                        </td>
                                        <td style="font-family: 'Orbitron', sans-serif;font-size:25px"><span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span> </td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-family: 'Dosis', sans-serif;font-size:15px"><?= tanggal_indo(date('Y-m-d'), TRUE) ?></span></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Pengujian</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= get_proses()->num_rows() ?><small> Proses</small></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_last_proses()->row()->created_proses)) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Dataset</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= get_dataset()->num_rows() ?><small> Row</small></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_update_dataset()->created_dataset)) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Itemset</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= get_last_itemset()->itemset_dataset ?><small> Itemset</small></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_update_dataset()->created_dataset)) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= get_count_user()->num_rows() ?> <small> Users</small></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_update_user()->created_user)) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <?php

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>