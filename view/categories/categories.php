<?php
// require 'categories-controller.php';
require '../../controller/categories-controller.php';

$user_role = $_SESSION['role'];

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/table.css">
    <base href="http://localhost:8080/Tugas-Besar-PW/view/">
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus kategori?');
        }
    </script>
</head>

<body>

    <?php
    include '../dashboard/header.php';
    include '../dashboard/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">

        <div class="container">
            <h1>Daftar Categories</h1>

            <a href="categories/category-add.php" class="btn btn-primary mb-3">Create new category</a>

            <div class="col-lg-4 col-md-6">
                <table class="table table-striped table-bordered rounded-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $index => $category) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $index + 1; ?></th>
                                <td><?= $category['name_category']; ?></td>
                                <td class="text-center">
                                    <a href="categories/category-edit.php?id_category=<?= $category['id_category']; ?>" class="badge text-bg-warning text-decoration-none"><span data-feather="edit" class="align-text-bottom"></span></a>
                                    <form action="" method="post" style="display:inline;" onsubmit="return confirmDelete()">
                                        <button type="submit" class="badge text-bg-danger text-decoration-none border-0" name="hapus" value="<?= $category['id_category']; ?>"><span data-feather="x-circle" class="align-text-bottom"></span></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="home-dashboard.php" class="btn btn-primary mb-3">Kembali</a>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        feather.replace();
    </script>

</body>

</html>