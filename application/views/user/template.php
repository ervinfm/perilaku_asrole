<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title><?= ucfirst($this->uri->segment(1)) ?> - <?= sistem()->nama_sistem ?></title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Dosis&family=Kanit:wght@300&family=Orbitron:wght@500&family=Play:wght@700&display=swap" rel="stylesheet">
    <style>
        .judul {
            font-size: 20px;
            color: #FFF;
            font-family: 'Balsamiq Sans', cursive;
        }
    </style>
</head>

<body>
    <?php $this->view('messages') ?>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <img src="<?= base_url() ?>assets/template/assets/img/brand/white.png" alt="..." style="width:100px"><span class="judul ml-3">| <?= sistem()->nama_sistem ?></span>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <img src="<?= base_url() ?>assets/template/assets/img/brand/white.png" alt="..." style="width:100px">
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

</body>

</html>