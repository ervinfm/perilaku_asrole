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
                    <span class="h3 m-0 p-0"><i class="fa fa-microchip"></i> Iterasi 1</span>
                </div>
                <div class="card-body">
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
                                        <?php foreach (get_iterasi1_byid($input['id'])->result() as $key => $iterasi1) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
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
                                        <?php foreach (get_iterasi1_byid($input['id'])->result() as $key => $iterasi1) {
                                            if ($iterasi1->jumlah > get_proses_log($input['id'])->min_support) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
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
            </div>
        </div>
    </div>
</div>