<?php
include 'include/header.php';
include 'include/nav.php';
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penawaran</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <?php

                $no = 1;
                include '../db/dbconnect.php';
                $tb_lelang = mysqli_query($conn, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas");
                while ($data_lelang = mysqli_fetch_array($tb_lelang)) {

                    ?>
                    <div class="col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                </div>
                                <h3 class="profile-username text-center"><?= $data_lelang['nama_barang'] ?></h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Tanggal</b> <a class="float-right">21 Februari 2023</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Harga Awal</b> <a class="float-right">Rp. 350.000</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Deskripsi Barang</b> <a class="float-right">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tawaran Tertinggi</b> <a class="float-right">Rp. 450.000</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Oleh</b> <a class="float-right">Nama User</a>
                                    </li>
                                </ul>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-tawar"><b>Tawar Barang</b></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal-ubahtawar"><b>Ubah Penawaran</b></a>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-ubahtawar">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Jumlah Tawaran</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nominal</label>
                                                        <input type="text" class="form-control" name="penawaran_harga">
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tawar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <div class="modal fade" id="modal-tawar">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Masukan Jumlah Tawaran</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nominal</label>
                                                        <input type="text" class="form-control" name="penawaran_harga">
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tawar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>