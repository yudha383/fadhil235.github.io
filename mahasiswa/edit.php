<?php
$nim = $_GET['nim'];
include "koneksi.php";

$qry = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$exec = mysqli_query($koneksi, $qry);
$data = mysqli_fetch_assoc($exec);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="update.php" method="POST">
                <fieldset>
                    <legend class="text-center">Edit Data Mahasiswa</legend>
                    <h2 class="text-center">Lengkapi biodata dengan benar</h2>
                    <div class="form-group">
                        <label for="nim">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="number" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <option value="001">Teknik Elektro</option>
                        <option value="002">Teknik Mesin</option>
                        <option value="003">Teknik Sipil</option>
                    </select>
                    </div>
                    <div class="form-group">
                       <label>Jenis Kelamin</label>
                         <div class="form-check">
                         <?php
                            if($data['gender'] == 1) {
                        ?>
                            <input type="radio" name="gender" value="1" checked> laki-laki
                            <input type="radio" name="gender" value="2"> Perempuan
                         </div>
                         <div class="form-check">
                            <?php } else { ?>
                            <input type="radio" name="gender" value="1"> laki-laki
                            <input type="radio" name="gender" value="2" checked> Perempuan
                        <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nohp">No. HP</label>
                        <input type="text" class="form-control" name="nohp" value="<?= $data['no_hp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
