<?php 
require 'categories-controller.php';

// jika tidak ada id di url
if (!isset($_GET['id_category'])) {
    header("location: categories.php");
}

// ambil id dari url
$id = $_GET['id_category'];

// query category berdasarkan id
$category = query("SELECT * FROM categories WHERE id_category = $id");

// cek apakah tombol ubah sudah di tekan
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0 ) {
        echo "<script>
                alert('data berhasil diubah');
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
</head>
<body>
    <div class="container col-8">
        <h1>Ubah Category</h1>

        <form action="" method="POST">
            <input type="hidden" name="category_id" value="<?= $category['id_category']; ?>">

            <div class="mb-3">
                <label for="title" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="title" name="name_category" required value="<?= $category['name_category']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

