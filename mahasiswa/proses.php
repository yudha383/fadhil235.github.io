<?php

$nim = $_POST['nim'];
$nama_mhs = $_POST['nama'];
$kode_jurusan = $_POST['jurusan'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['nohp'];
$email = $_POST['email'];

include "koneksi.php";

$qry = "INSERT INTO mahasiswa VALUES (
    '$nim', '$nama_mhs', '$kode_jurusan', '$gender', '$alamat', '$no_hp', '$email'
)";

$exec = mysqli_query($koneksi, $qry);

if($exec){
    echo "<script>alert('Data berhasil di simpan'); window.location = 'datamahasiswa.php';</script>";
}else{
    echo "Data gagal di simpan";
}