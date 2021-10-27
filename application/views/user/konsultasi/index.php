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
                            <h5 class="h2 text-white mb-0">Konsultasi Perilaku Mahasiswa</h5>
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
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-secondary" role="alert" id="success-alert">
                                    <strong>Informasi!</strong> Pastikan Mengisi data konsultasi dengan data yang sebenarnya, pengisian data secara tidak benar akan mempengaruhi hasil konsultasi!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-4 text-white">
                                <div class="form-group">
                                    <label>ID Konsultasi *</label>
                                    <input type="text" name="id" value="<?= random_string('numeric', 20) ?>" class="form-control " readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 text-white">
                                <div class="form-group">
                                    <label>Nama Clien *</label>
                                    <input type="text" value="<?= profil()->nama_user ?>" class="form-control " readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 text-white">
                                <div class="form-group">
                                    <label>Tanggal Konsultasi *</label>
                                    <input type="text" value="<?= tgl_indo(date('Y-m-d'), true) ?>" class="form-control " readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 text-white">
                                <?php $this->view('user/konsultasi/question') ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(800, 0).slideUp(800, function() {
            $(this).remove();
        });
    }, 4000);
</script>