<?php
include '../db/dbconnect.php';

$id_lelang = $_POST['id_lelang'];
$status = $_POST['status'];

mysqli_query($conn,"UPDATE tb_lelang SET status = '$status' WHERE id_lelang = '$id_lelang' ");

header('location:aktivasi.php?info=update');