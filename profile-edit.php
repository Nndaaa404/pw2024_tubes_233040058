<?php
require 'profile-controller.php';

$user_role = $_SESSION['role'];

// jika tidak ada id di url
if (!isset($_GET['id_user'])) {
    header("location: profile.php");
}

// ambil id dari url
$id = $_GET['id_user'];

$profile = query("SELECT id_user, name_user FROM users WHERE id_user = $id");

// cek apakah tombol ubah sudah di tekan
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'profile.php';
              </script>";
    } else {
        echo "data gagal di tambahkan";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php
    include 'dashboard/header.php';
    include 'dashboard/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3">

        <div class="container col-lg-8 col-md-8 col-10">
            <h1>Ubah Profile</h1>

            <form action="" method="POST">
                <input type="hidden" name="user_id" value="<?= $profile['id_user']; ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name_user" required value="<?= $profile['name_user']; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>