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
            <form action="prosesukm.php" method="POST">
                <fieldset>
                    <legend class="text-center">Pilih Unit Kegiatan Mahasiswa</legend>
                    <div class="form-group">
                        <label for="nim">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="number" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="id_ukm">
                    <option value="ukm01">Robotica</option>
                    <option value="ukm02">Band</option>
                    <option value="ukm03">Volly</option>
                    <option value="ukm04">Bulu Tangkis</option>
                    <option value="ukm05">Basket</option>
                    </select>
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
