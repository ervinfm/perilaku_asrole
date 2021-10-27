<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">

        </div>
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
                        <div class="col-sm-6 text-right">
                            <?php if (@$_GET['date_first'] == null || @$_GET['date_last'] == null) { ?>
                                <a href="" class="btn btn-sm btn-info">Step 1 : Filter Dataset</a>
                            <?php } else if (@$_GET['date_first'] != null || @$_GET['date_last'] != null) { ?>
                                <a href="" class="btn btn-sm btn-success">Step 2 : Entry Min Support dan Min Confident</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (@$_GET['date_first'] != null && @$_GET['date_last'] != null) { ?>
                        <form action="<?= site_url('admin/proses/hasil') ?>" method="post">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Min Support *</label>
                                        <input class="form-control" type="number" name="p_support" min="0" max="100" value="" id="example-date-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Min Confident *</label>
                                        <input class="form-control" type="number" name="p_confident" min="0" max="100" value="" id="example-date-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-3">
                                    <button type="submit" name="cek" class="btn btn-default mt-3"><i class="ni ni-atom"></i> Proses Data</button>
                                </div>
                                <div class="col-sm-12">
                                    <hr class="m-0 mb-3">
                                    <div class="table-responsive">
                                        <table class="table" id="tabledata">
                                            <thead>
                                                <tr>
                                                    <th width="2%">No</th>
                                                    <th width="8%">Datetime</th>
                                                    <th width="8%">Subjek</th>
                                                    <th>Itemset 1</th>
                                                    <th>Itemset 2</th>
                                                    <th>Itemset 3</th>
                                                    <th>Itemset 4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($row->result() as $key => $dataset) { ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= date('d/m/Y', strtotime($dataset->datetime_dataset)) ?></td>
                                                        <td><?= substr($dataset->subyek_dataset, 0, 15) ?></td>
                                                        <td><?= transformation_data($dataset->params1_dataset) ?></td>
                                                        <td><?= transformation_data($dataset->params2_dataset) ?></td>
                                                        <td><?= transformation_data($dataset->params3_dataset) ?></td>
                                                        <td><?= transformation_data($dataset->params4_dataset) ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal Awal *</label>
                                        <input class="form-control" type="date" name="date_first" value="<?= $this->session->flashdata('Date_first') ?>" id="example-date-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal Akhir *</label>
                                        <input class="form-control" type="date" name="date_last" value="<?= $this->session->flashdata('Date_last') ?>" id="example-date-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-3">
                                    <button type="submit" class="btn btn-default mt-3"><i class="ni ni-atom"></i> Cari Data</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>