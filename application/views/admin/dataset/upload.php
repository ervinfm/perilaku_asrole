    <?php
    $cleaning = 0;
    foreach ($transit->result() as $key => $dataset) {
        if ($dataset->params1_dataset == NULL || $dataset->params2_dataset == NULL || $dataset->params3_dataset == NULL || $dataset->params4_dataset == NULL) {
            $cleaning = $cleaning + 1;
        }
    }
    ?>

    <div class="col-sm-4 offset-sm-4 mb-3">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <a href="#" class="btn btn-sm btn-<?= @$_GET['action'] == '' ? 'danger' : 'neutral' ?>">Upload</a>
            <a href="#" class="btn btn-sm btn-<?= @$_GET['action'] == 'cleaning' ? 'warning' : 'neutral' ?>">Cleaning</a>
            <a href="#" class="btn btn-sm btn-<?= @$_GET['action'] == 'transformation' ? 'info' : 'neutral' ?>">Transformation</a>
            <a href="#" class="btn btn-sm btn-<?= @$_GET['action'] == 'submit' ? 'success' : 'neutral' ?>">Submit</a>
        </ul>
    </div>
    <div class="col-sm-12">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if ($transit->num_rows() > 0) {
                            if (@$_GET['action'] == null) { ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4><i>Preview Dataset : </i></h4>
                                    </div>
                                    <div class="col-sm-8 mb-2">
                                        <a href="?action=cleaning" class="btn btn-sm btn-info float-right"><i class="ni ni-atom"></i> Lanjut Cleaning</a>
                                        <a href="<?= site_url('admin/dataset/reset_transit') ?>" class="btn btn-sm btn-danger float-right mr-2" onclick="return confirm('Yakin Reset Dataset yang di unggah ?')"><i class="ni ni-scissors"></i> Reset</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="10%">Datetime</th>
                                                <th width="10%">Subjek</th>
                                                <th>Itemset 1</th>
                                                <th>Itemset 2</th>
                                                <th>Itemset 3</th>
                                                <th>Itemset 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transit->result() as $key => $dataset) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $dataset->datetime_dataset ?></td>
                                                    <td><?= $dataset->subyek_dataset ?></td>
                                                    <td><?= $dataset->params1_dataset ?></td>
                                                    <td><?= $dataset->params2_dataset ?></td>
                                                    <td><?= $dataset->params3_dataset ?></td>
                                                    <td><?= $dataset->params4_dataset ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['action'] == 'cleaning') { ?>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <?php if ($cleaning > 0) { ?>
                                            <span class="badge badge-warning">Data Perlu dilakukan Cleaning, Silahkan Cleaning Data</span>
                                        <?php } else { ?>
                                            <span class="badge badge-info">Data Tidak Perlu dilakukan Cleaning, Silahkan Lanjutkan Pada Transformasi Data</span>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <?php if ($cleaning > 0) { ?>
                                            <a href="#" class="btn btn-sm btn-secondary float-right" onclick="return alert('Dataset Perlu di Cleaning Terlebih Dahulu!')"><i class="ni ni-spaceship"></i> Lanjut Tranformation</a>
                                            <a href="<?= site_url('admin/dataset/cleaning') ?>" onclick="return confirm('Yakin Cleaning Data ?, data error akan otomatis terhapus!')" class="btn btn-sm btn-warning float-right mr-2"><i class="ni ni-atom"></i> Cleaning Data</a>
                                        <?php } else { ?>
                                            <a href="?action=transformation" class="btn btn-sm btn-info float-right"><i class="ni ni-spaceship"></i> Lanjut Tranformation</a>
                                            <a href="#" class="btn btn-sm btn-secondary float-right mr-2" onclick="return alert('Dataset Tidak Perlu di Cleaning!')"><i class="ni ni-atom"></i> Cleaning Data</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="10%">Datetime</th>
                                                <th width="10%">Subjek</th>
                                                <th>Itemset 1</th>
                                                <th>Itemset 2</th>
                                                <th>Itemset 3</th>
                                                <th>Itemset 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transit->result() as $key => $dataset) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $dataset->datetime_dataset  ?></td>
                                                    <td><?= $dataset->subyek_dataset ?></td>
                                                    <td><?= $dataset->params1_dataset == NULL ? '<i style="color:red">Error</i>' : $dataset->params1_dataset ?></td>
                                                    <td><?= $dataset->params2_dataset == NULL ? '<i style="color:red">Error</i>' : $dataset->params2_dataset ?></td>
                                                    <td><?= $dataset->params3_dataset == NULL ? '<i style="color:red">Error</i>' : $dataset->params3_dataset ?></td>
                                                    <td><?= $dataset->params4_dataset == NULL ? '<i style="color:red">Error</i>' : $dataset->params4_dataset ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['action'] == 'transformation') { ?>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <span class="badge badge-info">Data sudah di transformasi, Silahkan Lanjutkan Pada Submit data pada Basis Data</span>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <a href="?action=submit" class="btn btn-sm btn-success float-right"><i class="ni ni-box-2"></i> Lanjut Submit</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="10%">Datetime</th>
                                                <th>Itemset 1</th>
                                                <th>Itemset 2</th>
                                                <th>Itemset 3</th>
                                                <th>Itemset 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transit->result() as $key => $dataset) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $dataset->datetime_dataset  ?></td>
                                                    <td><?= transformation_data($dataset->params1_dataset) ?></td>
                                                    <td><?= transformation_data($dataset->params2_dataset) ?></td>
                                                    <td><?= transformation_data($dataset->params3_dataset) ?></td>
                                                    <td><?= transformation_data($dataset->params4_dataset) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['action'] == 'submit') { ?>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <span class="badge badge-success">Silahkan Submit Dataset ke dalam Basis Data!</span>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <a href="<?= site_url('admin/dataset/submit') ?>" class="btn btn-sm btn-success float-right"><i class="ni ni-box-2"></i> Submit</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="10%">Datetime</th>
                                                <th>Itemset 1</th>
                                                <th>Itemset 2</th>
                                                <th>Itemset 3</th>
                                                <th>Itemset 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transit->result() as $key => $dataset) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $dataset->datetime_dataset  ?></td>
                                                    <td><?= transformation_data($dataset->params1_dataset) ?></td>
                                                    <td><?= transformation_data($dataset->params2_dataset) ?></td>
                                                    <td><?= transformation_data($dataset->params3_dataset) ?></td>
                                                    <td><?= transformation_data($dataset->params4_dataset) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <form action="<?= site_url('admin/dataset/upload') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Silahkan Unggah Dataset Perilaku Mahasiswa UAD | Format xlsx : <a href="<?= base_url() . 'assets/example/format_dataset_prilaku_mahasiswa_uad.xlsx' ?>" target="_blank">example</a></label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="file" name="dataset" class="form-control" id="customFileLang" lang="en" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" name="upload" class="btn btn-info">Unggah Dataset</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>