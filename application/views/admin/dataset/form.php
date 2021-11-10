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
                            <h1> Tambah Dataset Baru</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= site_url('admin/dataset') ?>" class="btn btn-sm btn-danger">Dataset</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="mt-1">Banyak Data Baru : </label>
                                </div>
                                <div class="col-sm-2">
                                    <form action="" method="get">
                                        <div class="input-group mb-3">
                                            <input type="number" name="n" value="<?= @$_GET['n'] == NULL ? 1 : @$_GET['n'] ?>" class="form-control form-control-sm" min="1" max="25" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary btn-sm" type="submit" id="button-addon2">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <hr class="m-0 p-0">
                        </div>
                        <?php if (@$_GET['n']) {
                            if ($_GET['n'] <= 25) { ?>
                                <form action="<?= site_url('admin/dataset/proses') ?>" method="post">
                                    <div class="col-sm-12 mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="5%" class="text-center">No</td>
                                                        <td class="text-center">Subjek / Nama</td>
                                                        <td class="text-center">Sub Kriteria 1</td>
                                                        <td class="text-center">Sub Kriteria 2</td>
                                                        <td class="text-center">Sub Kriteria 3</td>
                                                        <td class="text-center">Sub Kriteria 4</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 1; $i <= @$_GET['n']; $i++) { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td>
                                                                <input type="text" name="d_subjek[]" placeholder="Subjek <?= $i ?>" class="form-control form-control-sm">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="d_param1[]" placeholder="kriteria A-<?= $i ?>" class="form-control form-control-sm">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="d_param2[]" placeholder="kriteria B-<?= $i ?>" class="form-control form-control-sm">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="d_param3[]" placeholder="kriteria C-<?= $i ?>" class="form-control form-control-sm">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="d_param4[]" placeholder="kriteria D-<?= $i ?>" class="form-control form-control-sm">
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-2 mb-2">
                                        <hr class="m-0 p-0">
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <button type="submit" name="insert" class="btn btn-success float-right"><i class="fa fa-download"></i> Tambah Data</button>
                                        <button type="reset" class="btn btn-danger float-right mr-1"><i class="fa fa-times-circle"></i> Reset </button>
                                    </div>
                                </form>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>