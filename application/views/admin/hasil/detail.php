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
                            <h1> Detail Hasil Association Rule Mining</h1>
                        </div>
                        <div class="col-sm-6">
                            <?php if (get_last_apriori()->num_rows() == 0) { ?>
                                <a href="" class="btn btn-default float-right btn-sm"><i class="ni ni-paper-diploma"></i> Cetak Hasil</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">

                                    <tr>
                                        <td>ID Proses</td>
                                        <td>:</td>
                                        <td><?= $row->id_proses  ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Rentang Tanggal</td>
                                        <td width="5%">:</td>
                                        <td><?= date('d M Y', strtotime($row->date_first)) . ' - ' . date('d M Y', strtotime($row->date_last)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Proses</td>
                                        <td>:</td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($row->created_proses)), TRUE) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Kriteria</td>
                                        <td>:</td>
                                        <td><?= $row->kriteria_proses == 1 ? 'Religiusitas' : ($row->kriteria_proses == 2 ? 'Kehidupan Sosial Keluarga' : ($row->kriteria_proses == 3 ? 'Masalah Akademik' : 'Masalah Keluarga'))  ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Minimum Support</td>
                                        <td width="5%">:</td>
                                        <td><?= $row->min_support  ?></td>
                                    </tr>
                                    <tr>
                                        <td>Minimum Confident</td>
                                        <td>:</td>
                                        <td><?= $row->min_confident . ' %'  ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4 mb-3">
                            <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 1 (Status Lolos)</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Item</th>
                                            <th>Jumlah</th>
                                            <th>Support</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach (get_iterasi1_byid($row->id_proses)->result() as $key => $iterasi1) {
                                            if ($iterasi1->jumlah > get_proses_log($row->id_proses)->min_support) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $iterasi1->atribut ?></td>
                                                    <td><?= $iterasi1->jumlah ?></td>
                                                    <td><?= round($iterasi1->support, 2) . ' %' ?></td>
                                                    <td><?= $iterasi1->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 2 (Status Lolos)</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Item1</th>
                                            <th>Item2</th>
                                            <th>Jumlah</th>
                                            <th>Support</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach (get_iterasi2_byid($row->id_proses)->result() as $key => $iterasi2) {
                                            if ($iterasi2->jumlah > get_proses_log($row->id_proses)->min_support) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $iterasi2->atribut1 ?></td>
                                                    <td><?= $iterasi2->atribut2 ?></td>
                                                    <td><?= $iterasi2->jumlah ?></td>
                                                    <td><?= round($iterasi2->support, 2) . ' %' ?></td>
                                                    <td><?= $iterasi2->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-archive-2"></i> Iterasi 3 (Status Lolos)</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Item1</th>
                                            <th>Item2</th>
                                            <th>Item3</th>
                                            <th>Jumlah</th>
                                            <th>Support</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (cek_itemset($row->id_proses, 3, TRUE)->num_rows() > 0) {
                                            foreach (cek_itemset($row->id_proses, 3, TRUE)->result() as $key => $iterasi3) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $iterasi3->atribut1 ?></td>
                                                    <td><?= $iterasi3->atribut2 ?></td>
                                                    <td><?= $iterasi3->atribut3 ?></td>
                                                    <td><?= $iterasi3->jumlah ?></td>
                                                    <td><?= round($iterasi3->support, 2) . ' %' ?></td>
                                                    <td><?= $iterasi3->lolos == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="7" class="text-center"><i><b>Tidak ada data yang lolos Iterasi 3</b></i></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <a class="btn btn-sm btn-success text-white mb-2"><i class="ni ni-atom"></i> Pembentukan Aturan Asosiasi</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabledata">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="30%">X => Y</th>
                                            <th>S xUy</th>
                                            <th>S x</th>
                                            <th>Confident</th>
                                            <th>Px</th>
                                            <th>Py</th>
                                            <th>PxUy</th>
                                            <th>Uji Lift</th>
                                            <th>Korelasi</th>
                                            <th width="10%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (get_hasil_apriori($row->id_proses)->num_rows() > 0) {
                                            $no = 1;
                                            foreach (get_hasil_apriori($row->id_proses)->result() as $key2 => $hasil) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $hasil->kombinasi1 . ' => ' . $hasil->kombinasi2 ?></td>
                                                    <td><?= $hasil->support_xUy ?></td>
                                                    <td><?= $hasil->support_x ?></td>
                                                    <td><?= $hasil->confidence . '%' ?></td>
                                                    <td><?= round($hasil->px, 2) ?></td>
                                                    <td><?= round($hasil->py, 2) ?></td>
                                                    <td><?= round($hasil->pxuy, 2) ?></td>
                                                    <td><?= $hasil->uji_lift ?></td>
                                                    <td><?= $hasil->aturan_korelasi ?></td>
                                                    <td><?= $hasil->lolos_proses_hasil == 1 ? '<a class="btn btn-sm btn-success rounded-circle text-white"><i class="fa fa-check-circle"></i></a>' : '<a class="btn btn-sm btn-danger rounded-circle text-white"><i class="fa fa-times-circle"></i></a>' ?></td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="alert alert-danger" role="alert">
                                                        <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                                        <span class="alert-text"><strong>Gagal!</strong> Proses Mining Gagal dan Tidak Menghasilkan Aturan Asosiasi!</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <a class="btn btn-sm btn-info text-white mb-3"><i class="ni ni-notification-70"></i> Konversi Asosiasi Lolos</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabledata">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>X => Y</th>
                                            <th>Confident</th>
                                            <th>Korelasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $n_conf = 0;
                                        $count = 0;
                                        foreach (get_hasil_apriori($row->id_proses)->result() as $key3 => $simpulan) {
                                            if ($simpulan->lolos_proses_hasil == 1) {
                                                $n_conf = $n_conf + $simpulan->confidence;
                                                $count = $count + 1 ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td>
                                                        <?php
                                                        $comb = explode(",", $simpulan->kombinasi1);
                                                        echo 'Jika ' . $comb[0] . ' dan ' . $simpulan->kombinasi2 . ' Maka ' . $simpulan->kombinasi2;
                                                        ?>
                                                    </td>
                                                    <td><?= $simpulan->confidence ?></td>
                                                    <td><?= $simpulan->aturan_korelasi ?></td>
                                                </tr>
                                        <?php }
                                            $average_conf = $n_conf / $count;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <a class="btn btn-sm btn-primary text-white mb-3"><i class="fa fa-info-circle"></i> Rincian Konversi</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="5%">No</th>
                                            <th class="text-center">Jika</th>
                                            <th class="text-center">Maka</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach (get_hasil_apriori($row->id_proses)->result() as $key4 => $konversi) {
                                            if ($konversi->lolos_proses_hasil == 1) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td>
                                                        <?php
                                                        $temp = explode(",", $konversi->kombinasi1);
                                                        if (count($temp) > 1) {
                                                            echo get_perilaku_transpost($temp[0], $row->kriteria_proses) . ' dan ' . get_perilaku_transpost($temp[1], $row->kriteria_proses);
                                                        } else {
                                                            echo get_perilaku_transpost($temp[0], $row->kriteria_proses);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= get_perilaku_transpost($konversi->kombinasi2, $row->kriteria_proses) ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
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