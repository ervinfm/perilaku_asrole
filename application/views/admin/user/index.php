<?php
switch (@$_GET['level']) {
    case 'admin':
        $level = 1;
        break;
    case 'users':
        $level = 2;
        break;
    default:
        $level = 1;
        break;
}

?>
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
                        <div class="col-sm-4">
                            <h1> Pengguna Sistem</h1>
                        </div>
                        <div class="col-sm-8">
                            <a href="#" data-toggle="modal" data-target="#modal_insert" class="btn btn-success btn-sm float-right"><i class="ni ni-fat-add"></i> Tambah User </a>
                            <div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <form action="<?= site_url('admin/user/proses') ?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="#!" class="btn btn-sm btn-primary mb-2">Data Profil Pengguna</a>
                                                        <div class="form-group">
                                                            <label>NIM Pengguna <small>(Kosongkan untuk Admin)</small></label>
                                                            <input type="number" name="u_nim" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Pengguna *</label>
                                                            <input type="text" name="u_nama" class="form-control form-control-sm" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Fakultas Pengguna <br><small>(Kosongkan untuk Admin)</small></label>
                                                                    <select name="u_fakultas" class="form-control form-control-sm" id="fakultas" required>
                                                                        <option value="">- pilih fakultas -</option>
                                                                        <?php foreach (get_fakultas()->result() as $key => $fakultas) { ?>
                                                                            <option value="<?= $fakultas->id_fakultas ?>"><?= $fakultas->id_fakultas . ' - ' . $fakultas->nama_fakultas ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Prodi Pengguna <br><small>(Kosongkan untuk Admin)</small></label>
                                                                    <select name="u_prodi" class="form-control form-control-sm" id="prodi" required>
                                                                        <option value="">- pilih program studi -</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="#!" class="btn btn-sm btn-primary mb-2">Data Akun Pengguna</a>

                                                        <div class="form-group">
                                                            <label>Email Pengguna *</label>
                                                            <input type="email" name="u_email" class="form-control form-control-sm" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Username Pengguna *</label>
                                                            <input type="text" name="u_username" class="form-control form-control-sm" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Level Pengguna *</label>
                                                                    <select name="u_level" class="form-control form-control-sm" required>
                                                                        <option value="">- pilih -</option>
                                                                        <option value="1">Administrator</option>
                                                                        <option value="2">Pengguna</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Status Pengguna *</label>
                                                                    <select name="u_status" class="form-control form-control-sm" required>
                                                                        <option value="">- pilih -</option>
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Non Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password Pengguna *</label>
                                                            <span class="badge badge-warning"> Password Pengguna Baru sama dengan Username!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="insert" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (@$_GET['level'] == 'admin' || @$_GET['level'] == null) { ?>
                                <a href="#" onclick="return alert('Halaman ini merupakan halaman akun admin!')" class="btn btn-sm btn-secondary"> Admin</a>
                                <a href="?level=users" class="btn btn-sm btn-default"> Users</a>
                            <?php } else { ?>
                                <a href="?level=admin" class="btn btn-sm btn-default "> Admin</a>
                                <a href="#" onclick="return alert('Halaman ini merupakan halaman akun users!')" class="btn btn-sm btn-secondary"> Users</a>
                            <?php } ?>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="table-responsive">
                                <table class="table" id="tabledata">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Pengguna</th>
                                            <?php if ($level == 2) { ?>
                                                <th scope="col" class="sort" data-sort="budget">Fakultas/Prodi</th>
                                            <?php } ?>
                                            <th scope="col" class="sort" data-sort="budget">Email</th>
                                            <th scope="col" class="sort" data-sort="status">Status</th>
                                            <th scope="col" class="sort" data-sort="completion">Level</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($row->result() as $key => $user) {
                                            if ($user->level_user == $level) { ?>
                                                <tr>
                                                    <td scope="row">
                                                        <div class="media align-items-center">
                                                            <a href="#" class="avatar rounded-circle mr-3">
                                                                <img alt="Image placeholder" src="<?= base_url() . 'assets/image/' . ($user->image_user == null ? 'default.jpg' : $user->image_user) ?>">
                                                            </a>
                                                            <div class="media-body">
                                                                <span class="name mb-0 text-sm"><?= $user->nama_user ?></span>
                                                                <?php if ($level == 2) { ?>
                                                                    <br>
                                                                    <span class="name mb-0 text-sm"><i style="font-size:10px"><?= $user->nim_user ?></i></span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php if ($level == 2) { ?>
                                                        <td><?= $user->id_fakultas . ' / ' . $user->id_prodi ?></td>
                                                    <?php  } ?>
                                                    <td class="budget">
                                                        <?= $user->email_user ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($user->status_user == 1) { ?>
                                                            <span class="badge badge-dot mr-4">
                                                                <i class="bg-success"></i>
                                                                <span class="status">Active</span>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-dot mr-4">
                                                                <i class="bg-danger"></i>
                                                                <span class="status">Non-Active</span>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($user->level_user == 1) { ?>
                                                            <span class="badge badge-success">Administrator</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-info">Pengguna</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php if ($user->id_user != profil()->id_user) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#modal_update<?= $user->id_user ?>" class="btn btn-warning btn-sm"><i class="ni ni-ruler-pencil"></i> Update</a>
                                                            <a href="<?= site_url('admin/user/delete/' . $user->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus User ?')"><i class="ni ni-fat-remove"></i> Delete</a>
                                                        <?php } else { ?>
                                                            <i>Your Account</i>
                                                        <?php } ?>
                                                    </td>
                                                    <div class="modal fade" id="modal_update<?= $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="<?= site_url('admin/user/proses') ?>" method="post">
                                                                <input type="hidden" name="id" value="<?= $user->id_user ?>">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update Pengguna Baru</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label>Nama Pengguna *</label>
                                                                                    <input type="text" name="u_nama" value="<?= $user->nama_user ?>" class="form-control form-control-sm" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label>Email Pengguna *</label>
                                                                                    <input type="email" name="u_email" value="<?= $user->email_user ?>" class="form-control form-control-sm" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label>Username Pengguna *</label>
                                                                                    <input type="text" name="u_username" value="<?= $user->username_user ?>" class="form-control form-control-sm" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label>Level Pengguna *</label>
                                                                                    <select name="u_level" class="form-control form-control-sm" required>
                                                                                        <option value="">- pilih -</option>
                                                                                        <option value="1" <?= $user->level_user == 1 ? 'selected' : null ?>>Administrator</option>
                                                                                        <option value="2" <?= $user->level_user == 2 ? 'selected' : null ?>>Pengguna</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label>Status Pengguna *</label>
                                                                                    <select name="u_status" class="form-control form-control-sm" required>
                                                                                        <option value="">- pilih -</option>
                                                                                        <option value="1" <?= $user->status_user == 1 ? 'selected' : null ?>>Aktif</option>
                                                                                        <option value="0" <?= $user->status_user == 0 ? 'selected' : null ?>>Non Aktif</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label>Password Pengguna <small>(Kosongkan jika tak diubah)</small></label>
                                                                                    <input type="password" name="u_pass" class="form-control form-control-sm">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" name="update" class="btn btn-primary">Perbaharui</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
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