<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title><?= ucfirst($this->uri->segment(2)) ?> - <?= sistem()->nama_sistem ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>assets/template/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

</head>

<body>
    <?php $this->view('messages') ?>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="<?= base_url() ?>assets/image/logo/<?= sistem()->logo_sistem == null ? 'default.png' : sistem()->logo_sistem ?>" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : null ?>" href="<?= site_url('admin/dashboard') ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'dataset' ? 'active' : null ?>" href="<?= site_url('admin/dataset') ?>">
                                <i class="ni ni-archive-2 text-orange"></i>
                                <span class="nav-link-text">Dataset</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'apriori' ? 'active' : null ?>" href="<?= site_url('admin/apriori') ?>">
                                <i class="ni ni-compass-04 text-yellow"></i>
                                <span class="nav-link-text">Association Rule Mining</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'hasil' ? 'active' : null ?>" href="<?= site_url('admin/hasil') ?>">
                                <i class="ni ni-trophy text-info"></i>
                                <span class="nav-link-text">Hasil Pengujian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'riwayat' ? 'active' : null ?>" href="<?= site_url('admin/riwayat') ?>">
                                <i class="ni ni-planet text-default"></i>
                                <span class="nav-link-text">Riwayat</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Configuration</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'admisi' ? 'active' : null ?>" href="<?= site_url('admin/admisi') ?>">
                                <i class="ni ni-building"></i>
                                <span class="nav-link-text">Fakultas dan Prodi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'setting' ? 'active' : null ?>" href="<?= site_url('admin/setting') ?>">
                                <i class="ni ni-controller"></i>
                                <span class="nav-link-text">Setting</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(2) == 'user' ? 'active' : null ?>" href="<?= site_url('admin/user') ?>">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-text">Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="<?= base_url() . 'assets/image/' . (profil()->image_user == null ? 'default.jpg' : profil()->image_user) ?>" style="width: 40px; height:40px">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?= profil()->nama_user ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="#!" class="dropdown-item" data-toggle="modal" data-target="#modal_profile">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= site_url('auth/logout') ?>" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <?= @$contents ?>

    </div>
    <div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('auth/proses') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Profil Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 text-center mb-2">
                                <img class="img-circle" alt="Image placeholder" src="<?= base_url() . 'assets/image/' . (profil()->image_user == null ? 'default.jpg' : profil()->image_user) ?>" style="width:150px; height:150px; border-radius:50%">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <td>Nama * </td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="p_nama" value="<?= profil()->nama_user ?>" class="form-control form-control-sm" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email * </td>
                                    <td>:</td>
                                    <td>
                                        <input type="email" name="p_email" value="<?= profil()->email_user ?>" class="form-control form-control-sm" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username * </td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="p_username" value="<?= profil()->username_user ?>" class="form-control form-control-sm" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td>
                                        <input type="password" name="p_pass" placeholder="kosongkan jika tak diubah" class="form-control form-control-sm">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>:</td>
                                    <td>
                                        <input type="file" name="image" placeholder="kosongkan jika tak diubah" class="form-control form-control-sm">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="profil">Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?= base_url() ?>assets/template/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="<?= base_url() ?>assets/template/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="<?= base_url() ?>assets/template/assets/js/argon.js?v=1.2.0"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#tabledata').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#fakultas').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= site_url('auth/get_prodi'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_prodi + '>' + data[i].id_prodi + ' - ' + data[i].nama_prodi + '</option>';
                        }
                        $('#prodi').html(html);

                    }
                });
                return false;
            });

        });
    </script>
</body>

</html>