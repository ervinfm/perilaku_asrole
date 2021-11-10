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
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-settings mr-2"></i></i>Pengaturan Utama</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-compass-04 mr-2"></i>History</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
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
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                    <table class="table" id="tabledata">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>User</th>
                                                <th>Aktivitas</th>
                                                <th>Perangkat</th>
                                                <th>Datetime</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (get_user_log()->result() as $key => $log) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td>
                                                        <?php $user[$key] = get_user_detail($log->id_user)->row(); ?>
                                                        <div class="avatar-group">
                                                            <a href="#" class="avatar avatar-sm rounded-circle" data-original-title="<?= $user[$key]->nama_user ?>" data-toggle="modal" data-target="#Modal<?= $key ?>">
                                                                <img alt="Image placeholder" src="<?= base_url() . 'assets/image/' . ($user[$key]->image_user == null ? 'default.jpg' : $user[$key]->image_user) ?> ">
                                                            </a>
                                                            <div class="modal fade" id="Modal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Profil Pengguna</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-xl-12 order-xl-2">
                                                                                <div class="card card-profile" style="background-color: #ecf0f1;border: 1px solid black;">
                                                                                    <img src="<?= base_url() ?>assets/template/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                                                                                    <div class="row justify-content-center">
                                                                                        <div class="col-lg-3 order-lg-2">
                                                                                            <div class="card-profile-image">
                                                                                                <a href="#">
                                                                                                    <img src="<?= base_url() . 'assets/image/' . ($user[$key]->image_user == null ? 'default.jpg' : $user[$key]->image_user) ?>" class="rounded-circle">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-body pt-5 mt-5">
                                                                                        <div class="text-center">
                                                                                            <h5 class="h3">
                                                                                                <?= ucfirst($user[$key]->nama_user) ?>
                                                                                            </h5>
                                                                                            <div class="h5 font-weight-300">
                                                                                                <i class="ni location_pin mr-2"><?= $user[$key]->email_user ?></i>
                                                                                            </div>
                                                                                            <div class="h5 mt-4">
                                                                                                <i class="ni business_briefcase-24 mr-2"></i><?= $user[$key]->level_user == 1 ? 'Administrator' : 'Pengguna' ?> - <?= $user[$key]->status_user == 1 ? '<span style="color:green"><i>Aktif</i></span>' : '<span style="color:red"><i>Non-Aktif</i></span>' ?>
                                                                                            </div>
                                                                                            <div>
                                                                                                <i class="ni education_hat mr-2"></i>Bergabung Sejak : <?= date('d/m/Y H:i', strtotime($user[$key]->created_user)) ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?= $log->target_user_log ?></td>
                                                    <td><?= $log->device_user_log ?></td>
                                                    <td><?= date('d/m/Y H:i:s', strtotime($log->created_user_log)) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

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