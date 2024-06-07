<?php
require '../../controller/posts-controller.php';

$user_role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

$users = query("SELECT id_user, name_user, username, email FROM users WHERE id_user = $user_id");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile - Resep Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/profile.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <base href="http://localhost:8080/Tugas-Besar-PW/view/">
</head>

<body>

    <?php
    include '../dashboard/header.php';
    include '../dashboard/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">
        <div class="container">
            <h1>My Profile</h1>
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="card-title">Profile Information</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= $users['name_user']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Username:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= $users['username']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Email:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= $users['email']; ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="profile/profile-edit.php?id_user=<?= $users['id_user']; ?>" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit Profile</a>
                    </div>
                </div>
            </div>
            <a href="home-dashboard.php" class="btn btn-primary mt-3">Back</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>
