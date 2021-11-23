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
                            <h1> <?= ucfirst($this->uri->segment(3)) ?> Program Studi </h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <a href="<?= site_url('admin/admisi/prodi/data/' . ($this->uri->segment(4) == 'insert' ? $this->uri->segment(5)  : @$prodi->id_fakultas)) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Kembali </a>
                        </div>
                        <div class="col-sm-12">
                            <form action="<?= site_url('admin/admisi/proses') ?>" method="post">
                                <input type="hidden" name="id" value="<?= @$prodi->id_prodi ?>">
                                <input type="hidden" name="id_fak" value="<?= $this->uri->segment(4) == 'insert' ? $this->uri->segment(5) : @$prodi->id_fakultas ?>">
                                <div class="form-group">
                                    <label>ID Program Studi *</label>
                                    <input type="number" name="p_id" value="<?= @$prodi->id_prodi ?>" class="form-control" placeholder="nomor atau id program studi" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Program Studi *</label>
                                    <input type="text" name="p_nama" value="<?= @$prodi->nama_prodi ?>" class="form-control" placeholder="nama program studi" required>
                                </div>
                                <button type="submit" name="<?= $this->uri->segment(4) == 'insert' ? 'insert_prodi' : 'update_prodi' ?>" class="btn btn-success float-right"><i class="ni ni-cloud-upload-96"></i> <?= ucfirst($this->uri->segment(4)) ?> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>