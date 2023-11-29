<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurusan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-fluid {
            padding-left: 0;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 220px;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 8px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
            color: white;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }

        .btn {
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-back {
            background-color: #343a40;
            color: #ffffff;
        }

        .btn-back:hover {
            background-color: #23272b;
        }
    </style>
</head>

<body>
<div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="../mahasiswa/datamahasiswa.php">
                                Data Mahasiswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tabeljurusan.php">
                                Tabel Jurusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ukm/ukm.php">
                                Tabel UKM
                            </a>
                        </li>
                        <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link" href="../login/logout.php">Logout</a>
                        </li>
                        </ul>
                    </ul>
                </div>
            </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="container">
    <div class="text-center"><h2>Tabel Jurusan</h2></div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include "koneksi.php";
                $qry = "SELECT * FROM jurusan";
                $exec = mysqli_query($koneksi, $qry);
                // Memeriksa koneksi
                if ($koneksi->connect_error) {
                    die("Koneksi gagal: " . $koneksi->connect_error);
                }

                // Menyisipkan data ke dalam tabel
                $sql = "INSERT INTO jurusan (kode_jurusan, nama_jurusan) VALUES
                        ('001', 'Sistem Komputer'),
                        ('002', 'Sistem Informasi'),
                        ('003', 'Teknologi Informasi')";

                
                
                while($data = mysqli_fetch_assoc($exec)){
            ?>
            <tr>
                <td><?= $data['kode_jurusan'] ?></td>
                <td><?= $data['nama_jurusan'] ?></td>
               
               
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
  </a>
</main>
</div>
</div>
</body>

</html>
