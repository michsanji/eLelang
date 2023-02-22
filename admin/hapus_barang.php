<?php
include '../db/dbconnect.php';

$id_barang = $_GET['id_barang'];

mysqli_query($conn,"DELETE FROM tb_barang WHERE id_barang = '$id_barang' ");

header('location:barang.php?info=hapus');