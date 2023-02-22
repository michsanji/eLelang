<?php
include 'include/header.php';
include 'include/nav.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Petugas Lelang</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Petugas</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 170px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-petugas">
                                            <i class="fas fa-plus"></i> Tambah Data Petugas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['info'])) {
                                if ($_GET['info'] == "hapus") { ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-exclamation-triangle"></i>Sukses</h5>
                                        Data Telah Berhasil Dihapus
                                    </div>
                                <?php } elseif ($_GET['info'] == "simpan") { ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-exclamation-triangle"></i>Sukses</h5>
                                        Data Telah Berhasil Disimpan
                                    </div>
                                <?php }
                                    if ($_GET['info'] == "update") { ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-exclamation-triangle"></i>Sukses</h5>
                                        Data Telah Berhasil Diperbaharui
                                    </div>
                            <?php }
                            } ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Petugas</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    include '../db/dbconnect.php';
                                    $tb_petugas = mysqli_query($conn, "SELECT * FROM tb_petugas INNER JOIN tb_level ON tb_petugas.id_level = tb_level.id_level");
                                    while ($data_petugas = mysqli_fetch_array($tb_petugas)) {

                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data_petugas['nama_petugas'] ?></td>
                                            <td><?= $data_petugas['username'] ?></td>
                                            <td><?= $data_petugas['level'] ?></td>
                                            <td>
                                                <?php if ($_SESSION['id_level'] == $data_petugas['id_level']) { ?>
                                                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-ubah-petugas<?= $data_petugas['id_petugas']; ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-ubah-petugas<?= $data_petugas['id_petugas']; ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-petugas<?= $data_petugas['id_petugas']; ?>">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <!-- MODAL ADD -->
                                        <div class="modal fade" id="modal-hapus-petugas<?= $data_petugas['id_petugas']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Petugas</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="hapus_petugas.php" method="post">
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus data <i><font color='red'><?= $data_petugas['nama_petugas']; ?></font></i>?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <a href="hapus_petugas.php?id_petugas=<?= $data_petugas['id_petugas']; ?>" class="btn btn-primary">Hapus</a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="modal fade" id="modal-ubah-petugas<?= $data_petugas['id_petugas']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Petugas</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="update_petugas.php" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Petugas</label>
                                                                <input type="text" name="id_petugas" value="<?= $data_petugas['id_petugas']; ?>" hidden>
                                                                <input type="text" class="form-control" name="nama_petugas" value="<?= $data_petugas['nama_petugas']; ?>" placeholder="Masukan Nama Petugas">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" name="username" value="<?= $data_petugas['username']; ?>" placeholder="Masukan Username Petugas">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="password" value="<?= $data_petugas['password']; ?>" placeholder="Masukan Password Petugas">
                                                                <i><font color='red'>* Abaikan jika tidak merubah password</font></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Level</label>
                                                                <select class="form-control" name="id_level">
                                                                    <option selected="true" disabled="disabled">PILIH ROLE</option>
                                                                    <?php 
                                                                    include '../db/dbconnect.php';
                                                                    $tb_level = mysqli_query($conn, "SELECT * FROM tb_level");
                                                                    while($data_level = mysqli_fetch_array($tb_level)) {
                                                                    ?>
                                                                    <option value="<?= $data_level['id_level'] ?>" <?php if($data_level['id_level'] == $data_petugas['id_level']) { 
                                                                        echo 'selected'; } ?>><?= $data_level['level'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="modal fade" id="modal-tambah-petugas">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Petugas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="simpan_petugas.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Petugas</label>
                                                    <input type="text" class="form-control" name="nama_petugas" placeholder="Masukan Nama Petugas">
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="Masukan Username Petugas">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Masukan Password Petugas">
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select class="form-control" name="id_level">
                                                        <option selected="true" disabled="disabled">PILIH ROLE</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Petugas</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>