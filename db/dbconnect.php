<?php
$conn = mysqli_connect("localhost", "aratade1_sanjifxt", "#cilengkrang2", "aratade1_elelang");
// $conn = mysqli_connect("localhost", "root", "", "elelang");

if (mysqli_connect_errno()) {
    echo 'Koneksi Database Gagal : ' . mysqli_connect_error();
}
