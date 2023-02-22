<?php
include '../db/dbconnect.php';

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];

mysqli_query($conn,"UPDATE tb_barang SET nama_barang = '$nama_barang', tgl = '$tgl', harga_awal = '$harga_awal', deskripsi_barang = '$deskripsi_barang' WHERE id_barang = '$id_barang' ");

header('location:barang.php?info=update');