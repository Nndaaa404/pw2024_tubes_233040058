<?php
require 'users-controller.php';

$users = query("SELECT * FROM users");
// var_dump($users);
// die();

// catatan untuk saya sendiri. perbaiki supaya ketika users di panggil password nya tidak usah di ikut sertakan.

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
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= $user['name_user']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td>
                            <a href="category-edit.php?id_category=<?= $category['id_category']; ?>" class="badge text-bg-danger text-decoration-none">Edit</a>
                            <form action="" method="post" style="display:inline;" onsubmit="return confirmDelete()">
                                <button type="submit" class="badge text-bg-danger text-decoration-none border-0" name="hapus" value="<?= $category['id_category']; ?>">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn btn-primary mb-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
