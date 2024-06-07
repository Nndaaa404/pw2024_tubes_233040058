<?php
require '../../controller/categories-controller.php';

$user_role = $_SESSION['role'];

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'categories.php';
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
    <title>Edit Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <base href="http://localhost:8080/Tugas-Besar-PW/view/">
</head>

<body>

    <?php
    include '../dashboard/header.php';
    include '../dashboard/sidebar.php';
    ?>

    <main class="col-md-9 col-sm-12 ms-sm-auto col-lg-12 px-md-4 p-3">

        <div class="container col-8">
            <h1>Tambah Category</h1>

            <a href="categories/categories.php" class="btn btn-success mb-3 mt-1"><span data-feather="arrow-left"></span> Back to all my
                    posts</a>

            <form action="" method="POST">

                <div class="mb-3 col-xl-7 col-lg-9 col-md-8 col-sm-7">
                    <label for="title" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="title" name="name_category" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        feather.replace();
    </script>

</body>

</html>