<?php

require "../controller/koneksi.php";
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika user belum login, redirect ke halaman login
    header("location:login.php");
    exit();
}

$user_role = $_SESSION['role'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts - Resep Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <?php
    include 'dashboard/header.php';
    include 'dashboard/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <?php if ($user_role == 'admin') : ?>
            <h2>Welcome Admin!</h2>
            <p>Ini adalah dashboard admin.</p>
        <?php else : ?>
            <h2>Welcome <?= $_SESSION['name_user'] ?>!</h2>
            <p>Ini adalah dashboard user.</p>
        <?php endif; ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>