<?php 
include "koneksi.php";

$message = ""; // Inisialisasi pesan error kosong

if(isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user) {
        // verifikasi password
        if(password_verify($password, $user["password"])) {
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ../mahasiswa/datamahasiswa.php");
            exit(); // Pastikan kode berhenti setelah redirect
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Username salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: white;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Masuk ke Pengelola Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <?php if ($message !== "") : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Username atau email" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" required />
                        </div>
                        <input type="submit" class="btn btn-secondary btn-block" name="login" value="Masuk" />
                        </form>
                    <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan kode JavaScript untuk menampilkan alert -->
<script>
    <?php if ($message !== "") : ?>
        alert("<?php echo $message; ?>");
    <?php endif; ?>
</script>

</body>
</html>