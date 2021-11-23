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
                            <h1> <?= ucfirst($this->uri->segment(3)) ?> Fakultas </h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <a href="<?= site_url('admin/admisi') ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Kembali </a>
                        </div>
                        <div class="col-sm-12">
                            <form action="<?= site_url('admin/admisi/proses') ?>" method="post">
                                <input type="hidden" name="id" value="<?= @$row->id_fakultas ?>">
                                <div class="form-group">
                                    <label>ID Fakutas *</label>
                                    <input type="number" name="f_id" value="<?= @$row->id_fakultas ?>" class="form-control" placeholder="nomor atau id fakultas" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Fakutas *</label>
                                    <input type="text" name="f_nama" value="<?= @$row->nama_fakultas ?>" class="form-control" placeholder="nama fakultas" required>
                                </div>
                                <button type="submit" name="<?= $this->uri->segment(3) == 'insert' ? 'insert_fakultas' : 'update_fakultas' ?>" class="btn btn-success float-right"><i class="ni ni-cloud-upload-96"></i> <?= ucfirst($this->uri->segment(3)) ?> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>