<?php
require 'categories-controller.php';

$categories = query("SELECT * FROM categories");

if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];
    $result = hapus($id);
    if ($result === -1) {
        echo "<script>
                alert('Gagal menghapus kategori: Kategori masih digunakan oleh postingan lain');
                document.location.href = 'categories.php';
              </script>";
        exit();
    } elseif ($result > 0) {
        echo "<script>
                alert('Kategori berhasil dihapus');
                document.location.href = 'categories.php';
              </script>";
        exit();
    } else {
        echo "Gagal menghapus kategori";
    }
}
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
        <h1>Daftar Categories</h1>

        <a href="category-add.php" class="btn btn-primary mb-3">Create new category</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $index => $category) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= $category['name_category']; ?></td>
                        <td>
                            <a href="post-edit.php?id_category=<?= $category['id_category']; ?>" class="badge text-bg-danger text-decoration-none">Edit</a>
                            <form action="categories.php" method="post" style="display:inline;" onsubmit="return confirmDelete()">
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
