<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                        <div class="col-sm-10">
                            <h1> Proses Association Rule Mining</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                            <form action="<?= site_url('admin/apriori/proses') ?>" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="#" for="input1" class="btn btn-sm btn-warning mb-2">Langkah 1 : Cari Data Perilaku Mahasiswa</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Tanggal Awal *</label>
                                            <input class="form-control" id="id-date-range-picker-1" type="date" name="date_first" value="<?= $this->session->flashdata('Date_first') ?>" id="example-date-input" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Tanggal Akhir *</label>
                                            <input class="form-control" type="date" name="date_last" value="<?= $this->session->flashdata('Date_last') ?>" id="example-date-input" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Sub Kriteria *</label>
                                            <select name="p_kriteria" class="form-control" required>
                                                <option value="">- pilih sub kriteria - </option>
                                                <option value="1" <?= $this->session->flashdata('P_kriteria') == 1 ? 'selected' : null ?>>1. Religiusitas (Kepedulian)</option>
                                                <option value="2" <?= $this->session->flashdata('P_kriteria') == 2 ? 'selected' : null ?>>2. Kehidupan Sosial dan Keluarga (Kepedulian)</option>
                                                <option value="3" <?= $this->session->flashdata('P_kriteria') == 3 ? 'selected' : null ?>>3. Masalah Akademik (Permasalahan) </option>
                                                <option value="4" <?= $this->session->flashdata('P_kriteria') == 4 ? 'selected' : null ?>>4. Masalah Keluarga (Permasalahan)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-3">
                                        <button type="submit" name="cari" class="btn btn-default btn-block mt-3"><i class="fa fa-search"></i> Cari Data</button>
                                    </div>
                                </div>
                                <?php if (@$row) { ?>
                                    <hr class="m-0 mb-2 p-0">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="#" for="input1" class="btn btn-sm btn-info mb-2">Dataset Perilaku Mahasiswa Rentang Tanggal <?= date('d M Y', strtotime($this->session->flashdata('Date_first'))) ?> - <?= date('d M Y', strtotime($this->session->flashdata('Date_last'))) ?> </a>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table" id="tabledata">
                                                    <thead>
                                                        <tr>
                                                            <th width="2%">No</th>
                                                            <th>Tanggal</th>
                                                            <th>Subjek</th>
                                                            <th>Itemset / Support</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($row->result() as $key => $dataset) { ?>
                                                            <tr>
                                                                <td><?= $key + 1 ?></td>
                                                                <td><?= date('d/m/Y', strtotime($dataset->datetime_dataset)) ?></td>
                                                                <td><?= $dataset->subyek_dataset ?></td>
                                                                <?php if ($input['p_kriteria'] == 1) { ?>
                                                                    <td><?= $dataset->params1_dataset ?></td>
                                                                <?php } else if ($input['p_kriteria'] == 2) { ?>
                                                                    <td><?= $dataset->params2_dataset ?></td>
                                                                <?php } else if ($input['p_kriteria'] == 3) { ?>
                                                                    <td><?= $dataset->params3_dataset ?></td>
                                                                <?php } else if ($input['p_kriteria'] == 4) { ?>
                                                                    <td><?= $dataset->params4_dataset ?></td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <a class="btn btn-danger float-right" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"> Lanjut Langkah 2 <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <form action="<?= site_url('admin/apriori/proses') ?>" method="post">
                                <input type="hidden" name="d_first" value="<?= $this->session->flashdata('Date_first') ?>" required>
                                <input type="hidden" name="d_last" value="<?= $this->session->flashdata('Date_last') ?>" required>
                                <input type="hidden" name="kriteria" value="<?= $this->session->flashdata('P_kriteria') ?>" required>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="#" for="input1" class="btn btn-sm btn-danger mb-2">Langkah 2 : Input Nilai Min. Support dan Min. Confident</a>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Minimum Support *</label>
                                            <input class="form-control" type="number" name="p_support" min="0" max="100" value="<?= $this->session->flashdata('P_support') ?>" id="example-date-input" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Minimum Confident *</label>
                                            <input class="form-control" type="number" name="p_confident" min="0" max="100" value="<?= $this->session->flashdata('P_confident') ?>" id="example-date-input" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-3">
                                        <button type="submit" name="proses" class="btn btn-default mt-3"><i class="fa fa-sync"></i> Proses Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>