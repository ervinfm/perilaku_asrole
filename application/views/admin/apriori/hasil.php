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
                            <a href="<?= site_url('admin/apriori/reset_proses/' . $input['id']) ?>" class="btn btn-sm btn-danger float-right" onclick="return confirm('Yakin Reset Proses Apriori ?, Data Proses akan dihapus Permanen!')"><i class="fa fa-trash"></i> Reset Proses</a>
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
                                        <td><?= $input['id']  ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Rentang Tanggal</td>
                                        <td width="5%">:</td>
                                        <td><?= date('d M Y', strtotime(get_proses_log($input['id'])->date_first)) . ' - ' . date('d M Y', strtotime(get_proses_log($input['id'])->date_last)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kriteria</td>
                                        <td>:</td>
                                        <td><?= $input['p_kriteria'] == 1 ? 'Kehidupan Sosial Keluarga' : ($input['p_kriteria'] == 2 ? 'Religiusitas' : ($input['p_kriteria'] == 3 ? 'Masalah Akademik' : 'Masalah Keluarga'))  ?></td>
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
                                        <td><?= get_proses_log($input['id'])->min_support  ?></td>
                                    </tr>
                                    <tr>
                                        <td>Minimum Confident</td>
                                        <td>:</td>
                                        <td><?= get_proses_log($input['id'])->min_confident . ' %'  ?></td>
                                    </tr>
                                    <tr>
                                        <td>Min. Support Relative</td>
                                        <td>:</td>
                                        <td><?= get_support_relative(get_proses_log($input['id'])->min_support) . ' %' ?></td>
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
                                <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#iterasi1"><i class="ni ni-atom mr-2"></i>Iterasi 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#iterasi2"><i class="ni ni-atom mr-2"></i>Iterasi 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#iterasi3"><i class="ni ni-atom mr-2"></i>Iterasi 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#rule"><i class="ni ni-calendar-grid-58 mr-2"></i>Association Rule</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="iterasi1" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-sm btn-primary text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 1 (Keseluruhan)</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="">
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
                                                foreach (get_iterasi1_byid($input['id'])->result() as $key => $iterasi1) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $iterasi1->atribut ?></td>
                                                        <td><?= $iterasi1->jumlah ?></td>
                                                        <td><?= round($iterasi1->support, 2) . ' %' ?></td>
                                                        <td><?= $iterasi1->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 1 (Status Lolos)</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="">
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
                                                foreach (get_iterasi1_byid($input['id'])->result() as $key => $iterasi1) {
                                                    if ($iterasi1->jumlah > get_proses_log($input['id'])->min_support) { ?>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="iterasi2" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-sm btn-primary text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 2 (Keseluruhan)</a>
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
                                                foreach (get_iterasi2_byid($input['id'])->result() as $key => $iterasi2) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $iterasi2->atribut1 ?></td>
                                                        <td><?= $iterasi2->atribut2 ?></td>
                                                        <td><?= $iterasi2->jumlah ?></td>
                                                        <td><?= round($iterasi2->support, 2) . ' %' ?></td>
                                                        <td><?= $iterasi2->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 2 (Status Lolos)</a>
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
                                                foreach (get_iterasi2_byid($input['id'])->result() as $key => $iterasi2) {
                                                    if ($iterasi2->jumlah > get_proses_log($input['id'])->min_support) { ?>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="iterasi3" role="tabpanel">
                            <?php if (cek_itemset($input['id'], 3, FALSE)->num_rows() > 0) { ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-sm btn-primary text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 3 (Keseluruhan)</a>
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
                                                    foreach (cek_itemset($input['id'], 3, FALSE)->result() as $key => $iterasi3) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $iterasi3->atribut1 ?></td>
                                                            <td><?= $iterasi3->atribut2 ?></td>
                                                            <td><?= $iterasi3->atribut3 ?></td>
                                                            <td><?= $iterasi3->jumlah ?></td>
                                                            <td><?= round($iterasi3->support, 2) . ' %' ?></td>
                                                            <td><?= $iterasi3->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 3 (Status Lolos)</a>
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
                                                    if (cek_itemset($input['id'], 3, TRUE)->num_rows() > 0) {
                                                        foreach (cek_itemset($input['id'], 3, TRUE)->result() as $key => $iterasi3) { ?>
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
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center"><i><b>Tidak ada data yang lolos Iterasi 3</b></i></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-warning" role="alert">
                                    <strong>Peringatan!</strong> Proses Mining Apriori Berhenti pada Iterasi 2!
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="rule" role="tabpanel">
                            <p class="description">Ervin</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>