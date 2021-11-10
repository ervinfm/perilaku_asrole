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
                        <div class="col-sm-12">
                            <h1> Setting Sistem Pemetaan Perilaku Mahasiswa</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (sistem()->admin_sistem == $this->session->userdata('user_id') || $this->session->userdata('setting_token') != null) { ?>
                        <form action="<?= site_url('admin/setting/proses') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="row">
                                <?php if ($row->status_sistem == 10) { ?>
                                    <div class="col-sm-12">
                                        <div class="alert alert-info" role="alert">
                                            <strong>Informasi!</strong> Saat Ini Sistem Hanya dapat digunakan Oleh Administrator ! (ADMIN ONLY MODE)
                                        </div>
                                    </div>
                                <?php } else if ($row->status_sistem == 0) { ?>
                                    <div class="col-sm-12">
                                        <div class="alert alert-info" role="alert">
                                            <strong>Informasi!</strong> Saat Ini tidak ada User yang dapat Menggunakan Sistem Kecuali ADMIN SISTEM!
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Sistem *</label>
                                        <input type="text" name="s_nama" value="<?= $row->nama_sistem ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Sistem *</label>
                                        <input type="email" name="s_email" value="<?= $row->email_sistem ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password Email Sistem *</label>
                                        <input type="text" name="s_email_pass" value="<?= $row->pass_email_sistem ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Logo Sistem * | <a href="<?= site_url('admin/setting/reset_logo') ?>" onclick="return confirm('Yakin Reset Logo ?')">Reset Logo?</a></label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Admin Sistem *</label>
                                        <select name="s_admin" class="form-control" <?= sistem()->admin_sistem == $this->session->userdata('user_id') ? 'required' : 'disabled' ?>>
                                            <option value="">- Pilih Admin -</option>
                                            <?php foreach (get_user_for_sistem()->result() as $key => $admin) { ?>
                                                <option value="<?= $admin->id_user ?>" <?= $row->admin_sistem == $admin->id_user ? 'selected' : null ?>><?= $admin->nama_user ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Status Sistem *</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?= $row->status_sistem == 1 ? '#' : site_url('admin/setting/status/1') ?>" class="btn btn-<?= $row->status_sistem == 1 ? 'secondary btn-sm' : 'success' ?>"><i class="ni ni-button-power"></i> ON</a>
                                                <a href="<?= $row->status_sistem == 0 ? '#' : site_url('admin/setting/status/0') ?>" class="btn btn-<?= $row->status_sistem == 0 ? 'secondary btn-sm' : 'danger' ?>"><i class="ni ni-button-power"></i> OFF</a>
                                                <a href="<?= $row->status_sistem == 10 ? '#' : site_url('admin/setting/status/10') ?>" class="btn btn-<?= $row->status_sistem == 10 ? 'secondary btn-sm' : 'warning' ?> float-right"><i class="ni ni-ui-04"></i> Admin Only</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" name="sistem" class="btn btn-primary">Update Sistem </button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-default alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Informasi!</strong> Silahkan Melakukan Authentikasi untuk Mengakses Sistem!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <form action="<?= site_url('admin/setting/proses') ?>" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-2 mt-2">
                                            Password Akun *
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="id" value="<?= profil()->id_user ?>">
                                                <input type="password" name="s_pass" value="<?= @$this->session->flashdata('passw') ?>" class="form-control" placeholder="Recipient's password" aria-label="Recipient's password" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit" name="auth_setting" id="button-addon2">Auth</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>