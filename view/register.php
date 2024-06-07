<?php
require '../controller/register-controller.php';

session_start();

if (isset($_SESSION['user_id'])) {
    // Redirect jika pengguna sudah masuk 
    header("Location: home-dashboard.php");
    exit;
}

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User baru berhasil ditambahkan!');
            document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
            alert('User gagal ditambahkan!');
            </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resep Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            color: #52616B;
            background-color: #F0F5F9;
        }
    </style>
</head>

<body class="d-flex align-items-center">

    <div class="container my-5">
        <div class="col-md-10 mx-auto col-lg-4">
            <form action="" method="POST" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                <h1 class="h3 mb-3 fw-normal text-center pb-4">Please Register</h1>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="name_user" placeholder="Ethan James Johnson" required>
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="chefethanj" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="register" value="register">Submit</button>
                <hr class="my-4">
                <small class="d-block text-center">Already registered? <a href="login.php">Login</a></small>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>