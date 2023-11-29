<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
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
                            <a class="nav-link" href="../jurusan/tabeljurusan.php">
                                Tabel Jurusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ukm.php">
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
    <div class="text-center"><h2>Tabel UKM</h2></div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kode UKM</th>
                        <th>Nama UKM</th>
                        <th>Act</th>
                        </tr>
        </thead>
        <tbody>
            <?php 
                include "koneksi.php";
                $qry = "SELECT u.nim, m.nama_mhs, u.id_ukm, n.nama_ukm FROM ukm u 
                JOIN namaukm n ON u.id_ukm = n.id_ukm
                JOIN mahasiswa m ON u.nim = m.nim";
        
                $exec = mysqli_query($koneksi, $qry);

                
                while($data = mysqli_fetch_assoc($exec)){
            ?>
            <tr>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama_mhs']?></td>
                        <td><?= $data['id_ukm']?></td>
                        <td><?= $data['nama_ukm']?></td>
                        <td>
                            <a href="edit_ukm.php?nim=<?= $data['nim'] ?>"><button class="btn btn-primary">Edit</button></a>
                            <a href="del_ukm.php?nim=<?= $data['nim'] ?>"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <a href="up_ukm.php">
                    <button class="btn btn-dark btn-lg">Input Data Mahasiswa</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
