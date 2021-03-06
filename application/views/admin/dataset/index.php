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
                            <h1> Dataset dan Preprocessing</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= site_url('admin/dataset') ?>" class="btn btn-sm btn-<?= $this->uri->segment(3) == null ? 'default' : 'neutral' ?>">Dataset</a>
                            <a href="<?= site_url('admin/dataset/upload') ?>" class="btn btn-sm btn-<?= $this->uri->segment(3) == 'upload' ? 'danger' : 'neutral' ?>">Upload</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if ($this->uri->segment(3) == null) { ?>
                            <div class="col-sm-12 mb-2 mt-0 pt-0">
                                <a href="<?= site_url('admin/dataset/insert?n=1') ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle"></i> Tambah </a>
                                <?php if ($row->num_rows() > 0) { ?>
                                    <a href="" id="btn-delete" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalResetDataset"><i class="fa fa-times-circle"></i> Reset Dataset</a>
                                    <div class="modal fade" id="modalResetDataset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="<?= site_url('admin/dataset/reset_dataset') ?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Reset Dataset Perilaku Mahasiswa UAD</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="alert alert-warning" role="alert">
                                                                    <strong>Peringatan!</strong> Data Akan Terhapus Permanen!
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Konfirmasi Password Akun Anda : </label>
                                                                    <input type="password" name="r_pass" class="form-control form-control-sm" placeholder="please entry your passwod ..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="reset" class="btn btn-danger btn-sm">Reset Sekarang</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12">
                                <form action="<?= site_url('admin/dataset/proses') ?>" method="post">
                                    <div class="table-responsive">
                                        <table class="table" id="tabledata">
                                            <thead>
                                                <tr>
                                                    <th width="2%">No</th>
                                                    <th width="8%">Datetime</th>
                                                    <th width="8%">Subjek / (Fakultas/Prodi)</th>
                                                    <th>Itemset 1</th>
                                                    <th>Itemset 2</th>
                                                    <th>Itemset 3</th>
                                                    <th>Itemset 4</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($row->result() as $key => $dataset) { ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= date('d/m/Y', strtotime($dataset->datetime_dataset)) ?></td>
                                                        <td><?= substr($dataset->subyek_dataset, 0, 10) . ' - (' ?><a href="<?= site_url('admin/admisi/prodi/data/' . $dataset->id_fakultas) ?>" target="_blank"><?= $dataset->id_fakultas . ' / ' . $dataset->id_prodi ?></a>)</td>
                                                        <td><?= $dataset->params1_dataset ?></td>
                                                        <td><?= $dataset->params2_dataset ?></td>
                                                        <td><?= $dataset->params3_dataset ?></td>
                                                        <td><?= $dataset->params4_dataset ?></td>
                                                        <td>
                                                            <input type="checkbox" name="id[]" value="<?= $dataset->id_dataset ?>">
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($row->num_rows() > 0) { ?>
                                        <div class="col-sm-12 mt-3">
                                            <button type="submit" name="delete" onclick="return confirm('Yakin Menhapus data-data berikut?')" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i> Delete Data Selected</button>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        <?php } else if ($this->uri->segment(3) == 'upload') {
                            $this->view('admin/dataset/upload');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>