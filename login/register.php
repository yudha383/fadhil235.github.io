<?php
include "koneksi.php";

$message = ""; // Inisialisasi pesan error kosong

if(isset($_POST['register'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // Cek apakah username sudah ada di database
    $checkUsernameSQL = "SELECT * FROM users WHERE username = :username";
    $checkStmt = $db->prepare($checkUsernameSQL);
    $checkStmt->bindParam(':username', $username);
    $checkStmt->execute();

    $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if($existingUser) {
        $message = "Username sudah terdaftar!";
    } else {
        $sql = "INSERT INTO users (name, username, email, password) 
                VALUES (:name, :username, :email, :password)";
        $stmt = $db->prepare($sql);

        $params = array(
            ":name" => $name,
            ":username" => $username,
            ":password" => $password,
            ":email" => $email
        );

        $saved = $stmt->execute($params);

        if($saved) {
            header("Location: login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
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

        /* Custom Alert Style */
        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Isilah data dengan valid</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">

                        <?php if ($message !== "") : ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <?php echo $message; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input class="form-control" type="text" name="name" placeholder="Nama kamu" required />
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" placeholder="Username" required />
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Alamat Email" required />
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required />
                            </div>

                            <input type="submit" class="btn btn-secondary btn-block" name="register" value="Daftar" />

                            <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
