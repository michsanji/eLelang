<?php
include '../db/dbconnect.php';

$id_barang = $_POST['id_barang'];
$tgl_lelang = date(Y-m-d);
$id_petugas = $_POST['id_petugas'];
$deskripsi_barang = $_POST['deskripsi_barang'];

mysqli_query($conn,"INSERT INTO tb_lelang VALUES('', '$id_barang', '$tgl_lelang', '', '', '$id_petugas', '')");

header('location:aktivasi.php?info=simpan');