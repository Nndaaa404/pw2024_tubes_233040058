<?php
require 'users-controller.php';

$user_role = $_SESSION['role'];

$users = query("SELECT id_user, name_user, username, email, role FROM users");

if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];
    $result_message = hapus($id);
    echo "<script>";
    if (strpos($result_message, 'berhasil') !== false) {
        echo "alert('$result_message');";
        echo "document.location.href = 'users.php';";
    } else {
        echo "alert('$result_message');";
    }
    echo "</script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts - Resep Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus pengguna?');
        }
    </script>
</head>

<body>

    <?php
    include 'dashboard/header.php';
    include 'dashboard/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">

        <div class="container">
            <h1>Daftar Users</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $user['name_user']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a href="user-edit.php?id_user=<?= $user['id_user']; ?>" class="badge text-bg-danger text-decoration-none">Edit</a>
                                <form action="" method="post" style="display:inline;" onsubmit="return confirmDelete()">
                                    <button type="submit" class="badge text-bg-danger text-decoration-none border-0" name="hapus" value="<?= $user['id_user']; ?>">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="home-dashboard.php" class="btn btn-primary mb-3">Kembali</a>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>