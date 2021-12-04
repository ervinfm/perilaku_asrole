<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
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
                            <h1> Pengaturan Rekomendasi Apriori</h1>
                        </div>
                        <div class="col-sm-4 offset-sm-2">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 <?= @$_GET['lev'] == null ? 'active' : (@$_GET['lev'] == 1 ? 'active' : null) ?>" href="?lev=1"><i class="ni ni-building mr-2"></i>Fakultas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 <?= @$_GET['lev'] == 2 ? 'active' : null ?>" href="?lev=2"><i class="ni ni-user-run mr-2"></i>Individu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if (@$_GET['lev'] == null || @$_GET['lev'] == 1) { ?>
                            <div class="col-sm-12">
                                <form action="<?= site_url('admin/rekomendasi/proses') ?>" method="post">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <?php
                                            $no = 1;
                                            foreach ($row->result() as $key => $data) { ?>
                                                <input type="hidden" name="id[]" value="<?= $data->id_rekomendasi ?>">
                                                <tr>
                                                    <td><b><?= $no++ . '. ' . kriteria_data($data->keriteria_rekomendasi) ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <textarea name="isi[]" id="ckeditor<?= $key ?>" class="form-control" rows="3"><?= $data->isi_rekomendasi ?></textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor<?= $key ?>');
                                                        </script>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                    </div>
                                    <button type="submit" name="fakultas" class="btn btn-success float-right mt-2">Simpan Perubahan</button>
                                </form>
                            </div>
                        <?php } else if (@$_GET['lev'] == 2) { ?>
                            <div class="col-sm-12">
                                <form action="<?= site_url('admin/rekomendasi/proses') ?>" method="post">
                                    <table class="table table-bordered">
                                        <?php
                                        $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                            <input type="hidden" name="id[]" value="<?= $data->id_rekomendasi ?>">
                                            <tr>
                                                <td><b><?= 'Rekomendasi Tingkat Stres : ' .  $data->min_rekomendasi . '% - ' . $data->max_rekomendasi . '% (' . level_stres($data->min_rekomendasi) . ')' ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <textarea name="isi[]" id="ckeditor<?= $key ?>" class="form-control" rows="3"><?= $data->isi_rekomendasi ?></textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor<?= $key ?>');
                                                    </script>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <button type="submit" name="individu" class="btn btn-success float-right mt-2"> Simpan Perubahan </button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>