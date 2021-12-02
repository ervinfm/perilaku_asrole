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
                            <h1> Proses Association Rule Mining</h1>
                        </div>
                        <div class="col-sm-6">
                            <?php if ($row->status_proses == 0) { ?>
                                <a href="<?= site_url('admin/apriori/simpan_proses/' . $row->id_proses) ?>" class="btn btn-sm btn-success float-right ml-2" onclick="return confirm('Yakin Submit Proses Apriori ?, Pastikan Semua Proses Berjalan Benar sebelum ditandai sebagai selesai!')"><i class="fa fa-check-circle"></i> Simpan Hasil </a>
                                <a href="<?= site_url('admin/apriori/reset_proses/' . $row->id_proses) ?>" class="btn btn-sm btn-danger float-right" onclick="return confirm('Yakin Reset Proses Apriori ?, Data Proses akan dihapus Permanen!')"><i class="fa fa-trash"></i> Reset </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
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
                                        <td><?= $row->kriteria_proses == 1 ? 'Religiusitas ' : ($row->kriteria_proses == 2 ? 'Kehidupan Sosial Keluarga' : ($row->kriteria_proses == 3 ? 'Masalah Akademik' : 'Masalah Keluarga'))  ?></td>
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
                                        <td>Min. Support Relative</td>
                                        <td>:</td>
                                        <td><?= get_support_relative($row->min_support) . ' %' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="h3 m-0 p-0"><i class="fa fa-microchip"></i> Proses Iterasi Association Rule Mining</span>
                </div>
                <div class="card-body">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 " data-toggle="tab" href="#iterasi1"><i class="ni ni-atom mr-2"></i>Iterasi 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#iterasi2"><i class="ni ni-atom mr-2"></i>Iterasi 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#iterasi3"><i class="ni ni-atom mr-2"></i>Iterasi 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#rule"><i class="ni ni-calendar-grid-58 mr-2"></i>Association Rule</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="iterasi1" role="tabpanel">
                            <div class="row">
                                <?php foreach (get_fakultas()->result() as $key => $fakultas) { ?>
                                    <div class="col-sm-6 mt-2">
                                        <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th>Item</th>
                                                        <th>Jumlah</th>
                                                        <th>Support</th>
                                                        <th width="10%">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach (get_iterasi1_byid($row->id_proses, $fakultas->id_fakultas)->result() as $key => $iterasi1) {
                                                        if ($iterasi1->jumlah > get_proses_log($row->id_proses)->min_support) { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $iterasi1->atribut ?></td>
                                                                <td><?= $iterasi1->jumlah ?></td>
                                                                <td><?= round($iterasi1->support, 2) . ' %' ?></td>
                                                                <td><?= $iterasi1->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="iterasi2" role="tabpanel">
                            <div class="row">
                                <?php foreach (get_fakultas()->result() as $f1 => $fakultas) {
                                    if (get_iterasi2_byid($row->id_proses, $fakultas->id_fakultas, true)->num_rows() > 0) { ?>
                                        <div class="col-sm-6 mt-2">
                                            <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th>Item1</th>
                                                            <th>Item2</th>
                                                            <th>Jumlah</th>
                                                            <th>Support</th>
                                                            <th width="10%">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $no = 1;
                                                        foreach (get_iterasi2_byid($row->id_proses, $fakultas->id_fakultas)->result() as $key => $iterasi2) {
                                                            if ($iterasi2->lolos == 1) { ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= $iterasi2->atribut1 ?></td>
                                                                    <td><?= $iterasi2->atribut2 ?></td>
                                                                    <td><?= $iterasi2->jumlah ?></td>
                                                                    <td><?= round($iterasi2->support, 2) . ' %' ?></td>
                                                                    <td><?= $iterasi2->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-sm-6 mt-2">
                                            <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Tidak ada Data!</strong> Proses Iterasi berhenti pada iterasi 1!
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="iterasi3" role="tabpanel">
                            <div class="row">
                                <?php foreach (get_fakultas()->result() as $f1 => $fakultas) {
                                    if (get_iterasi3_byid($row->id_proses, $fakultas->id_fakultas, true)->num_rows() > 0) { ?>
                                        <div class="col-sm-12 mt-2">
                                            <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th>Item1</th>
                                                            <th>Item2</th>
                                                            <th>Item3</th>
                                                            <th>Jumlah</th>
                                                            <th>Support</th>
                                                            <th width="10%">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $no = 1;
                                                        foreach (get_iterasi3_byid($row->id_proses, $fakultas->id_fakultas)->result() as $key => $iterasi3) {
                                                            if ($iterasi2->lolos == 1) { ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= $iterasi3->atribut1 ?></td>
                                                                    <td><?= $iterasi3->atribut2 ?></td>
                                                                    <td><?= $iterasi3->atribut3 ?></td>
                                                                    <td><?= $iterasi3->jumlah ?></td>
                                                                    <td><?= round($iterasi3->support, 2) . ' %' ?></td>
                                                                    <td><?= $iterasi3->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-sm-12 mt-2">
                                            <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>Tidak ada Data!</strong> Proses Iterasi berhenti pada iterasi 2!
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="rule" role="tabpanel">
                            <div class="row">
                                <?php foreach (get_fakultas()->result() as $f1 => $fakultas) {
                                    if (get_hasil_apriori($row->id_proses, $fakultas->id_fakultas)->num_rows() > 0) { ?>
                                        <div class="col-sm-12">
                                            <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tabledata<?= $f1 ?>">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="30%">X => Y</th>
                                                            <th>Confident</th>
                                                            <th>Uji Lift</th>
                                                            <th>Korelasi</th>
                                                            <th width="10%">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach (get_hasil_apriori($row->id_proses, $fakultas->id_fakultas)->result() as $key2 => $hasil) { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $hasil->kombinasi1 . ' => ' . $hasil->kombinasi2 ?></td>
                                                                <td><?= $hasil->confidence . '%' ?></td>
                                                                <td><?= $hasil->uji_lift ?></td>
                                                                <td><?= $hasil->aturan_korelasi ?></td>
                                                                <td><?= $hasil->lolos_proses_hasil == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-sm-12 mt-2 mb-2">
                                            <a class="btn btn-sm btn-default text-white mb-2"><i class="ni ni-building"></i> <?= ucfirst($fakultas->nama_fakultas) . ' (' . $fakultas->id_fakultas . ')' ?></a>
                                            <div class="alert alert-danger" role="alert">
                                                <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                                <span class="alert-text"><strong>Gagal!</strong> Proses Mining Gagal dan Tidak Menghasilkan Aturan Asosiasi!</span>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>