<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="part1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

        <div class="table-responsive">
            <table class="table table-bordered text-white">
                <tr>
                    <td colspan="3"><span class="h3 text-white">A. Aspek Religiusitas Mahasiswa</span>
                        <a href="#" class="btn btn-sm btn-info float-right"> Tahap 1</a>
                    </td>
                </tr>
                <tr>
                    <td width="60%">Percaya bahwa Allah selalu hadir setiap saat?</td>
                    <td><?= range_jawaban('quesA1') ?></td>
                </tr>
                <tr>
                    <td>Percaya saat mengalami masalah Allah menolong dengan jalan yang tidak terduga?</td>
                    <td><?= range_jawaban('quesA2') ?></td>
                </tr>
                <tr>
                    <td>Saat mengalami masalah terpikir mengambil jalan yang salah seperti bunuh diri atau menggunakan narkoba?</td>
                    <td><?= range_jawaban('quesA3') ?></td>
                </tr>
                <tr>
                    <td>Melakukan salat 5 waktu dan Membaca Al-Quran?</td>
                    <td><?= range_jawaban('quesA4') ?></td>
                </tr>
                <tr>
                    <td> Bersyukur atas nikmat yang telah diberikan?</td>
                    <td><?= range_jawaban('quesA5') ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-12 mt-2">
            <a class="btn btn-secondary float-right" id="tabs-icons-text-2-tab" data-toggle="tab" href="#part2" role="tab" aria-controls="tabs-icons-text-2"> Selanjutnya <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="tab-pane fade" id="part2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
            <div class="table-responsive">
                <table class="table table-bordered text-white">
                    <tr>
                        <td colspan="3"><span class="h3 text-white">B. Kehidupan Sosial Dan Keluarga </span>
                            <a href="#" class="btn btn-sm btn-warning float-right"> Tahap 2</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="60%">Memiliki keluarga dan teman yang mendukung kamu?</td>
                        <td><?= range_jawaban('quesB1') ?></td>
                    </tr>
                    <tr>
                        <td>Memiliki teman dan kehidupan sosial yang membahagiakan?</td>
                        <td><?= range_jawaban('quesB2') ?></td>
                    </tr>
                    <tr>
                        <td>Memiliki banyak waktu bersama orang-orang yang membuat bahagia?</td>
                        <td><?= range_jawaban('quesB3') ?></td>
                    </tr>
                    <tr>
                        <td>Berani menyatakan tidak nyaman untuk hal yang tidak disukai?</td>
                        <td><?= range_jawaban('quesB4') ?></td>
                    </tr>
                    <tr>
                        <td>Merasa bahwa kehidupan pribadi mendukung aktivitas perkuliahan?</td>
                        <td><?= range_jawaban('quesB5') ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-12 mt-2">
                <a class="btn btn-secondary float-right" id="tabs-icons-text-2-tab" data-toggle="tab" href="#part3" role="tab" aria-controls="tabs-icons-text-2"> Selanjutnya <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="part3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
        <div class="table-responsive">
            <table class="table table-bordered text-white">
                <tr>
                    <td colspan="3"><span class="h3 text-white">C. Masalah Akademik </span>
                        <a href="#" class="btn btn-sm btn-danger float-right"> Tahap 3</a>
                    </td>
                </tr>
                <tr>
                    <td width="60%">Kesulitan untuk melaksanakan penelitian skripsi selama pandemi ?</td>
                    <td><?= range_jawaban('quesC1') ?></td>
                </tr>
                <tr>
                    <td>Kesulitan mengikuti perkuliahan secara daring ?</td>
                    <td><?= range_jawaban('quesC2') ?></td>
                </tr>
                <tr>
                    <td>Tugas selama pandemi terlalu banyak ?</td>
                    <td><?= range_jawaban('quesC3') ?></td>
                </tr>
                <tr>
                    <td>Kesulitan mengikuti ujian dengan metode daring selama pandemi ?</td>
                    <td><?= range_jawaban('quesC4') ?></td>
                </tr>
                <tr>
                    <td>Kesulitan Bimbingan Magang/Skripsi selama pandemi ??</td>
                    <td><?= range_jawaban('quesC5') ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-12 mt-2">
            <a class="btn btn-secondary float-right" id="tabs-icons-text-2-tab" data-toggle="tab" href="#part4" role="tab" aria-controls="tabs-icons-text-2"> Selanjutnya <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="tab-pane fade" id="part4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
        <div class="table-responsive">
            <table class="table table-bordered text-white">
                <tr>
                    <td colspan="3"><span class="h3 text-white">D. Masalah Keluarga </span>
                        <a href="#" class="btn btn-sm btn-success float-right"> Tahap 4</a>
                    </td>
                </tr>
                <tr>
                    <td width="60%">Mengalami Broken Home ?</td>
                    <td><?= range_jawaban('quesD1') ?></td>
                </tr>
                <tr>
                    <td>Merasa bahwa anggota keluarga tidak peduli ?</td>
                    <td><?= range_jawaban('quesD2') ?></td>
                </tr>
                <tr>
                    <td>Kehilangan anggota keluarga yang sangat disayangi ?</td>
                    <td><?= range_jawaban('quesD3') ?></td>
                </tr>
                <tr>
                    <td>Orang tua terlalu mendominasi dalam memutuskan segala hal ?</td>
                    <td><?= range_jawaban('quesD4') ?></td>
                </tr>
                <tr>
                    <td>Adanya permasalahan keluarga yang cukup berat (PHK) ?</td>
                    <td><?= range_jawaban('quesD5') ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-12 mt-2">
            <button type="submit" name="quesioner" class="btn btn-info float-right"><i class="fa fa-microchip"></i> Konsultasikan </button>
        </div>
    </div>
</div>