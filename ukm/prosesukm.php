<?php

$nim = $_POST['nim'];
$id_ukm = $_POST['id_ukm'];
include "koneksi.php";

$qry = "INSERT INTO ukm VALUES (
    '$nim', '$id_ukm'
)";

$exec = mysqli_query($koneksi, $qry);

if($exec){
    echo "<script>alert('Data berhasil di simpan'); window.location = 'ukm.php';</script>";
}else{
    echo "Data gagal di simpan";
}