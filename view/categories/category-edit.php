<?php
require '../../controller/categories-controller.php';

$user_role = $_SESSION['role'];

// jika tidak ada id di url
if (!isset($_GET['id_category'])) {
    header("location: categories.php");
}

// ambil id dari url
$id = $_GET['id_category'];

// query category berdasarkan id
$category = query("SELECT * FROM categories WHERE id_category = $id");

// cek apakah tombol ubah sudah di tekan
// if (isset($_POST['submit'])) {
//     if (ubah($_POST) > 0) {
//         echo "<script>
//                 alert('data berhasil diubah');
//                 document.location.href = 'categories.php';
//               </script>";
//     } else {
//         echo "data gagal di tambahkan";
//     }
// }


if (isset($_POST['submit'])) {
    $result = ubah($_POST);
    if ($result > 0) {
        echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'categories.php';
                </script>";
    } elseif ($result === 0) {
        echo "<script>
                alert('Tidak ada perubahan data');
                document.location.href = 'categories.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                document.location.href = 'categories.php';
              </script>";
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
            <h1>Ubah Category</h1>

            <form action="" method="POST">
                <input type="hidden" name="category_id" value="<?= $category['id_category']; ?>">

                <div class="mb-3 mb-3 col-xl-7 col-lg-9 col-md-8 col-sm-7">
                    <label for="title" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="title" name="name_category" required value="<?= $category['name_category']; ?>">
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