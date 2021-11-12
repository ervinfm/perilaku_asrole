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
                            <h1> Riwayat Association Rule Mining</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabledata">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>ID Proses</th>
                                            <th>Tanggal Dataset</th>
                                            <th>Min. Support</th>
                                            <th>Min. Confident</th>
                                            <th>Tanggal Proses</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->id_proses ?></td>
                                                <td><?= tanggal_indo($data->date_first) . ' - ' . tanggal_indo($data->date_last) ?></td>
                                                <td><?= $data->min_support ?></td>
                                                <td><?= $data->min_confident . ' %' ?></td>
                                                <td><?= tanggal_indo(date('Y-m-d', strtotime($data->created_proses))) . ' ' . date('H:i:s', strtotime($data->created_proses)) ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-primary rounded-circle" title="Lihat Detail"><i class="fa fa-file-invoice"></i></a>
                                                    <a href="" class="btn btn-sm btn-default rounded-circle" title="Cetak Hasil"><i class="fa fa-print"></i></a>
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