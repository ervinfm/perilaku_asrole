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
                        <div class="col-sm-4">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-single-02 mr-2"></i>Administrator</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fa fa-users mr-2"></i>Pengguna</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tabledata">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th>ID Proses</th>
                                                            <th>Tanggal Dataset</th>
                                                            <th>Min. Support</th>
                                                            <th>Min. Confident</th>
                                                            <th>Tanggal Proses</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($row->result() as $key => $data) { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $data->id_proses ?></td>
                                                                <td><?= tanggal_indo($data->date_first) . ' - ' . tanggal_indo($data->date_last) ?></td>
                                                                <td><?= $data->min_support ?></td>
                                                                <td><?= $data->min_confident . ' %' ?></td>
                                                                <td><?= tanggal_indo(date('Y-m-d', strtotime($data->created_proses))) . ' ' . date('H:i:s', strtotime($data->created_proses)) ?></td>
                                                                <td>
                                                                    <a href="<?= site_url('admin/riwayat/detail/' . $data->id_proses) ?>" class="btn btn-sm btn-primary rounded-circle" title="Lihat Detail"><i class="fa fa-file-invoice"></i></a>
                                                                    <a href="<?= site_url('admin/riwayat/cetak/' . $data->id_proses) ?>" target="_blank" class="btn btn-sm btn-default rounded-circle" title="Cetak Hasil"><i class="fa fa-print"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tabledata50">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th>Pengguna</th>
                                                            <th>Fakultas</th>
                                                            <th>ID Proses</th>
                                                            <th>Tingkat Stres</th>
                                                            <th>Status</th>
                                                            <th>Tanggal Proses</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($row2->result() as $key => $data) {
                                                            $user = get_user_detail($data->author_proses)->row();
                                                            $min = array();
                                                            foreach (get_konsultasi_hasil($data->id_proses)->result() as $key => $term) {
                                                                array_push($min, $term->confidence);
                                                            }
                                                            $min_conf = min($min); ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $user->nim_user . ' - ' . $user->nama_user ?></td>
                                                                <td><?= $user->id_fakultas . ' - ' . $user->id_prodi ?></td>
                                                                <td><?= $data->id_proses ?></td>
                                                                <td><?= round($min_conf, 1) . '%' ?></td>
                                                                <td><?= level_stres($min_conf) ?></td>
                                                                <td><?= tanggal_indo(date('Y-m-d', strtotime($data->created_proses))) . ' ' . date('H:i:s', strtotime($data->created_proses)) ?></td>
                                                                <td>
                                                                    <a href="<?= site_url('admin/riwayat/detail_mhs/' . $data->id_proses) ?>" class="btn btn-sm btn-primary rounded-circle" title="Lihat Detail"><i class="fa fa-file-invoice"></i></a>
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
    </div>
</div>