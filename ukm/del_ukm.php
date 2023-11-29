<?php

$nim = $_GET['nim'];

include "koneksi.php";
$qry = "DELETE FROM ukm WHERE nim = '$nim'";
$exec = mysqli_query($koneksi, $qry);

if($exec){
    echo "<script>alert('Data berhasil dihapus'); window.location = 'ukm.php'</script>";
}else{
    echo "Data gagal dihapus";
}