<?php
include '../db/dbconnect.php';

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];

mysqli_query($conn,"INSERT INTO tb_petugas VALUES('', '$nama_petugas', '$username', '$password', '$id_level')");

header('location:petugas.php?info=simpan');