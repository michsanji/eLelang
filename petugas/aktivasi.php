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
                    <h1 class="m-0">Aktivasi Data Lelang Barang</h1>
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
                            <h3 class="card-title">Data Aktivasi Lelang</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 170px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-lelang">
                                            <i class="fas fa-plus"></i> Tambah Data Barang
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
                                        <th>Nama Barang</th>
                                        <th>Tanggal Lelang</th>
                                        <th>Harga Tertinggi</th>
                                        <th>Nama Penawar</th>
                                        <th>Status Lelang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    include '../db/dbconnect.php';
                                    $tb_petugas = mysqli_query($conn, "SELECT * FROM tb_petugas WHERE username = '$_SESSION[username]'");
                                    $tb_lelang = mysqli_query($conn, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang INNER JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas");
                                    while ($data_lelang = mysqli_fetch_array($tb_lelang)) {

                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data_lelang['nama_barang'] ?></td>
                                            <td><?= $data_lelang['tgl_lelang'] ?></td>
                                            <td>Rp. 750.000</td>
                                            <td>Nama Penawar</td>
                                            <td>
                                                <?php if ($data_lelang['status'] == '') { ?>
                                                    <div class="btn btn-warning btn-sm">Lelang Belum Aktif</div>
                                                <?php } else if ($data_lelang['status'] == 'dibuka') { ?>
                                                    <div class="btn btn-success btn-sm">Lelang Dibuka</div>
                                                <?php } else { ?>
                                                    <div class="btn btn-danger btn-sm">Lelang Ditutup</div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-buka<?= $tb_lelang['id_lelang'] ?>">Buka Lelang</button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-tutup<?= $tb_lelang['id_lelang'] ?>">Tutup Lelang</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-buka<?= $tb_lelang['id_lelang'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Aktivasi Buka Lelang</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="update_lelang_buka.php" method="post">
                                                        <div class="modal-body">
                                                            <p>Apakah anda ingin membuka lelang?</p>
                                                            <div class="form-group">
                                                                <label>Nama Barang</label>
                                                                <select class="form-control" name="id_level">
                                                                    <option selected="true" disabled="disabled">PILIH BARANG LELANG</option>
                                                                    <?php
                                                                        include '../db/dbconnect.php';
                                                                        $tb_barang = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                                        while ($data_barang = mysqli_fetch_array($tb_barang)) {
                                                                            ?>
                                                                        <option value="<?= $data_barang['id_barang'] ?>" <?php if ($data_barang['id_barang'] == $data_petugas['id_barang']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?= $data_barang['nama_barang'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="dibuka" name="status" hidden>
                                                                <input type="text" class="form-control" value="<?= $tb_lelang['id_lelang'] ?>" name="id_lelang" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Buka Lelang</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <div class="modal fade" id="modal-tutup<?= $tb_lelang['id_lelang'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Aktivasi Tutup Lelang</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="update_lelang_tutup.php" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <p>Apakah anda ingin menutup lelang?</p>
                                                                <input type="text" class="form-control" value="ditutup" name="status" hidden>
                                                                <input type="text" class="form-control" value="<?= $tb_lelang['id_lelang'] ?>" name="id_lelang" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Tutup Lelang</button>
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
                            <div class="modal fade" id="modal-tambah-lelang">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Lelang</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="simpan_lelang.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <select class="form-control" name="id_barang">
                                                        <option selected disabled>PILIH BARANG LELANG</option>
                                                        <?php
                                                        include '../db/dbconnect.php';
                                                        $tb_barang = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                        while ($data_barang = mysqli_fetch_array($tb_barang)) {
                                                            ?>
                                                            <option value="<?= $data_barang['id_barang'] ?>" <?php if ($data_barang['id_barang'] == $data_barang['id_barang']) { } ?>><?= $data_barang['nama_barang'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                    include '../db/dbconnect.php';
                                                    $tb_petugas = mysqli_query($conn, "SELECT * FROM tb_petugas WHERE username = '$_SESSION[username]'");
                                                    while ($data_petugas = mysqli_fetch_array($tb_petugas)) {
                                                        ?>
                                                        <input type="text" class="form-control" value="<?= $data_petugas['id_petugas'] ?>" name="id_petugas" hidden>
                                                    <?php } ?>
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