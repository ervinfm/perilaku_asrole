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
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <a href="<?= site_url('admin/admisi/insert') ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabledata">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>ID Fakultas</td>
                                            <td>Nama Fakultas</td>
                                            <td>Jumlah Prodi</td>
                                            <td>Selengkapnya</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($fakultas->result() as $key => $fak) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $fak->id_fakultas ?></td>
                                                <td><?= $fak->nama_fakultas ?></td>
                                                <td><?= get_prodi($fak->id_fakultas)->num_rows() . ' Program' ?></td>
                                                <td><a href="<?= site_url('admin/admisi/prodi/data/' . $fak->id_fakultas) ?>" class="btn btn-info btn-sm "><i class="ni ni-ruler-pencil"></i> Kelola </a></td>
                                                <td>
                                                    <a href="<?= site_url('admin/admisi/update/' . $fak->id_fakultas) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= site_url('admin/admisi/delete/' . $fak->id_fakultas) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus Data Fakultas ?')"><i class="fa fa-trash"></i></a>
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