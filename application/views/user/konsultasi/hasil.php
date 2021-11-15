<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row pt-4">
                <div class="col-lg-6 ">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#"><?= ucfirst($this->uri->segment(1)) ?></a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="<?= site_url('dashboard') ?>" class="btn btn-sm btn-neutral"><i class="fas fa-home"></i> Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h2 text-white mb-0">Proses Konsultasi Perilaku Mahasiswa</h5>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0">
                                    <a href="" class="btn btn-sm btn-neutral"><i class="fas fa-history"></i> Riwayat Konsultasi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body text-white">
                    <?php
                    konsul_iterasi1($row->id_proses);
                    konsul_iterasi2($row->id_proses);
                    konsul_iterasi3($row->id_proses);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>