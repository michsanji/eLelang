<?php
$conn = mysqli_connect("localhost", "root", "", "mylelang");

if (mysqli_connect_errno()) {
    echo 'Koneksi Database Gagal : ' . mysqli_connect_error();
}
?>