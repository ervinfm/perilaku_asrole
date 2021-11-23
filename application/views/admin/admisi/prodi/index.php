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
                            <h1> Administrasi Fakultas dan Program Studi</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= site_url('admin/admisi') ?>" class="btn btn-sm btn-default">Fakultas</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <a href="<?= site_url('admin/admisi/prodi/insert/' . $this->uri->segment(5)) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabledata">
                                    <thead>
                                        <tr>
                                            <td width="5%">No</td>
                                            <td width="25%">ID Prodi</td>
                                            <td>Nama Prodi</td>
                                            <td width="10%">Created Prodi</td>
                                            <td width="10%">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($prodi->result() as $key => $prodi) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $prodi->id_prodi ?></td>
                                                <td><?= $prodi->nama_prodi ?></td>
                                                <td><?= date('d M Y', strtotime($prodi->created_prodi)) ?></td>
                                                <td>
                                                    <a href="<?= site_url('admin/admisi/prodi/update/' . $prodi->id_prodi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= site_url('admin/admisi/delete_prodi/' . $prodi->id_prodi . '/' . $prodi->id_fakultas) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data Prodi ?')"><i class="fa fa-trash"></i></a>
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