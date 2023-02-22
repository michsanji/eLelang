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
                    <h1 class="m-0">Pendataan Barang</h1>
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
                            <h3 class="card-title">Data Barang</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 170px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-barang">
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
                                        <th>Tanggal Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Deskripsi Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    include '../db/dbconnect.php';
                                    $tb_barang = mysqli_query($conn, "SELECT * FROM tb_barang");
                                    while ($data_barang = mysqli_fetch_array($tb_barang)) {

                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data_barang['nama_barang'] ?></td>
                                            <td><?= $data_barang['tgl'] ?></td>
                                            <td>Rp. <?= number_format($data_barang['harga_awal']) ?></td>
                                            <td><?= $data_barang['deskripsi_barang'] ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-ubah-barang<?= $data_barang['id_barang']; ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-barang<?= $data_barang['id_barang']; ?>">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- MODAL ADD -->
                                        <div class="modal fade" id="modal-hapus-barang<?= $data_barang['id_barang']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="">
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <a href="hapus_barang.php?id_barang=<?= $data_barang['id_barang']; ?>" class="btn btn-primary">Hapus</a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="modal fade" id="modal-ubah-barang<?= $data_barang['id_barang']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="update_barang.php" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Barang</label>
                                                                <input type="text" name="id_barang" value="<?= $data_barang['id_barang']; ?>" hidden>
                                                                <input type="text" class="form-control" name="nama_barang" value="<?= $data_barang['nama_barang']; ?>" placeholder="Nama Barang">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Barang</label>
                                                                <input type="date" class="form-control" name="tgl" value="<?= $data_barang['tgl']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Harga Barang</label>
                                                                <input type="number" class="form-control" name="harga_awal" value="<?= $data_barang['harga_awal']; ?>" placeholder="Harga Barang">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi Barang</label>
                                                                <textarea name="deskripsi_barang" class="form-control" rows="3"><?= $data_barang['deskripsi_barang']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                            <div class="modal fade" id="modal-tambah-barang">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="simpan_barang.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Barang</label>
                                                    <input type="date" class="form-control" name="tgl">
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Barang</label>
                                                    <input type="number" class="form-control" name="harga_awal" placeholder="Harga Barang">
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi Barang</label>
                                                    <textarea name="deskripsi_barang" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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