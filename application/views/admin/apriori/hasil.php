<?php
$data1 = get_support_params1($row);
$data2 = get_support_params2($row);
$data3 = get_support_params3($row);
$data4 = get_support_params4($row);
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" width="5%">Itemset</th>
                                    <th colspan="2">Kriteria 1</th>
                                    <th colspan="2">Kriteria 2</th>
                                    <th colspan="2">Kriteria 3</th>
                                    <th colspan="2">Kriteria 4</th>
                                </tr>
                                <tr>
                                    <?php for ($i = 0; $i < 4; $i++) {  ?>
                                        <th>Count | Support</th>
                                        <th>Status</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">STS</td>

                                    <td><?= $data1['count1'] . ' | ' . $data1['support1'] . '%'  ?></td>
                                    <td class="text-white"><?= $data1['count1'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data2['count1'] . ' | ' . $data2['support1'] . '%'  ?></td>
                                    <td class="text-white"><?= $data2['count1'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data3['count1'] . ' | ' . $data3['support1'] . '%'  ?></td>
                                    <td class="text-white"><?= $data3['count1'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data4['count1'] . ' | ' . $data4['support1'] . '%'  ?></td>
                                    <td class="text-white"><?= $data4['count1'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                </tr>
                                <tr>
                                    <td class="text-center">TS</td>

                                    <td><?= $data1['count2'] . ' | ' . $data1['support2'] . '%'  ?></td>
                                    <td class="text-white"><?= $data1['count2'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data2['count2'] . ' | ' . $data2['support2'] . '%'  ?></td>
                                    <td class="text-white"><?= $data2['count2'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data3['count2'] . ' | ' . $data3['support2'] . '%'  ?></td>
                                    <td class="text-white"><?= $data3['count2'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data4['count2'] . ' | ' . $data4['support2'] . '%'  ?></td>
                                    <td class="text-white"><?= $data4['count2'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                </tr>
                                <tr>
                                    <td class="text-center">N</td>

                                    <td><?= $data1['count3'] . ' | ' . $data1['support3'] . '%'  ?></td>
                                    <td class="text-white"><?= $data1['count3'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data2['count3'] . ' | ' . $data2['support3'] . '%'  ?></td>
                                    <td class="text-white"><?= $data2['count3'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data3['count3'] . ' | ' . $data3['support3'] . '%'  ?></td>
                                    <td class="text-white"><?= $data3['count3'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data4['count3'] . ' | ' . $data4['support3'] . '%'  ?></td>
                                    <td class="text-white"><?= $data4['count3'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                </tr>
                                <tr>
                                    <td class="text-center">S</td>

                                    <td><?= $data1['count4'] . ' | ' . $data1['support4'] . '%'  ?></td>
                                    <td class="text-white"><?= $data1['count4'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data2['count4'] . ' | ' . $data2['support4'] . '%'  ?></td>
                                    <td class="text-white"><?= $data2['count4'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data3['count4'] . ' | ' . $data3['support4'] . '%'  ?></td>
                                    <td class="text-white"><?= $data3['count4'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data4['count4'] . ' | ' . $data4['support4'] . '%'  ?></td>
                                    <td class="text-white"><?= $data4['count4'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                </tr>
                                <tr>
                                    <td class="text-center">SS</td>

                                    <td><?= $data1['count5'] . ' | ' . $data1['support5'] . '%'  ?></td>
                                    <td class="text-white"><?= $data1['count5'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data2['count5'] . ' | ' . $data2['support5'] . '%'  ?></td>
                                    <td class="text-white"><?= $data2['count5'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data3['count5'] . ' | ' . $data3['support5'] . '%'  ?></td>
                                    <td class="text-white"><?= $data3['count5'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>

                                    <td><?= $data4['count5'] . ' | ' . $data4['support5'] . '%'  ?></td>
                                    <td class="text-white"><?= $data4['count5'] > $input['p_support'] ? '<a class="btn btn-sm btn-success rounded-circle"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times-circle"></i></a>' ?></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>