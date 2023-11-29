<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="proses.php" method="POST">
                <fieldset>
                    <legend class="text-center">Form Input Data Mahasiswa</legend>
                    <h2>Lengkapi biodata dengan benar</h2>
                    <div class="form-group">
                        <label for="nim">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="number" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama" name="nama">
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
                        <label for="gender">Gender </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="1">
                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="2">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="nohp">No. HP</label>
                        <input type="text" class="form-control" id="nohp" name="nohp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
