<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login - Pemetaan Perilaku Mahasiswa UAD</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>assets/template/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>

</head>

<body class="bg-default">
    <?php $this->view('messages') ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-7 pt-lg-7">

            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <?php if ($this->session->userdata('forgot') != null) { ?>
                                <div class="text-center text-muted mb-5">
                                    <h3>Please Cek Email and Entry Code Here </h3>
                                    <span style="color: red; font-size:12px"><i><?= @$this->session->flashdata('forgot') ?></i></span>
                                </div>
                                <form action="<?= site_url('auth/proses') ?>" method="POST" role="form">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Code" type="number" name="code" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="verifikasi" class="btn btn-primary my-4">Verification</button>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <div class="text-center text-muted mb-5">
                                    <h3>Please Sign-in With Credentials </h3>
                                    <span style="color: red; font-size:12px"><i><?= @$this->session->flashdata('login') ?></i></span>
                                </div>
                                <form action="<?= site_url('auth/proses') ?>" method="POST" role="form">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                            </div>
                                            <input class="form-control" value="<?= @$this->session->flashdata('Username') ?>" placeholder="Username" type="text" name="username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" value="<?= @$this->session->flashdata('Password') ?>" placeholder="Password" type="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                        <label class="custom-control-label" for=" customCheckLogin">
                                            <span class="text-muted">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="login" class="btn btn-primary my-4">Sign in</button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <a href="#" class="text-light text-left" data-toggle="modal" data-target="#forgot"><small>Forgot password?</small></a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#" class="text-light" data-toggle="modal" data-target="#activate"><small>Activate?</small></a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="text-light float-right" data-toggle="modal" data-target="#signup"><small>Sign Up Account?</small></a>
                        </div>
                        <!-- <div class="col-6 text-right">
                            <a href="#" class="text-light"><small>Create new account</small></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; <?= date('Y') ?> <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Mabes Group Industries div Developer</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.mabesgroup.org" class="nav-link" target="_blank">Mabes Group Industries</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/ervinfm" class="nav-link" target="_blank">Mabes Developer Lisense</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal forgot -->
    <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('auth/proses') ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Masukkan Email Anda untuk Reset Password *</label>
                            <input type="text" name="f_email" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="forgot" class="btn btn-primary">Reset</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Signup -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('auth/proses') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="h5 modal-title" id="exampleModalLabel">Sign Up Account for Access</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="col-sm-12">
                                <p style="color:red; font-size:12px"><i>Daftarkan Identitas Anda dengan Benar *</i></p>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input type="email" name="s_email" value="<?= @$this->session->flashdata('s_Email') ?>" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label>Full Name *</label>
                                <input type="text" name="s_name" value="<?= @$this->session->flashdata('s_Name') ?>" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="s_username" value="<?= @$this->session->flashdata('s_Username') ?>" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" name="s_password" value="<?= @$this->session->flashdata('s_Password') ?>" class="form-control form-control-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="signup" class="btn btn-primary">Sign-Up</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Activate -->
    <div class="modal fade" id="activate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('auth/proses') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="h5 modal-title" id="exampleModalLabel">Activate Account for Access</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="col-sm-12">
                                <p style="color:red; font-size:12px"><i>Dapatkan Kode Verifikasi pada Email Anda *</i></p>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input type="email" name="s_email" value="<?= @$this->session->flashdata('s_Email') ?>" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" name="s_password" value="<?= @$this->session->flashdata('s_Password') ?>" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label>Code *</label>
                                <input type="number" name="s_code" value="<?= @$this->session->flashdata('s_Code') ?>" class="form-control form-control-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="activate" class="btn btn-primary">Activate</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <!-- Argon JS -->
    <script src="<?= base_url() ?>assets/template/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>