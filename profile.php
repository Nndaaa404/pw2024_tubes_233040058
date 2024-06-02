<?php
require 'profile-controller.php';

// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$user_id = $_SESSION['user_id'];

$users = query("SELECT id_user, name_user, username, email FROM users WHERE id_user = $user_id");
// var_dump($users["role"]);
// die();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts - Resep Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus kategori?');
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Daftar Users</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $users['name_user']; ?></td>
                        <td><?= $users['username']; ?></td>
                        <td><?= $users['email']; ?></td>
                        <td>
                            <a href="profile-edit.php?id_user=<?= $users['id_user']; ?>" class="badge text-bg-danger text-decoration-none">Edit</a>
                        </td>
                    </tr>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn btn-primary mb-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
