<?php

$kode_jurusan = $_GET['kode_jurusan'];

include "koneksi.php";
$qry = "DELETE FROM jurusan WHERE kode_jurusan = '$kode_jurusan'";
$exec = mysqli_query($koneksi, $qry);

if($exec){
    echo "<script>alert('Data berhasil dihapus'); window.location = 'tabeljurusan.php'</script>";
}else{
    echo "Data gagal dihapus";
}