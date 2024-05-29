<?php
require 'posts-controller.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0 ) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'posts.php';
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
    <title>Tambah Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container col-8">
        <h1>Tambah Postingan Baru</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" id="category" name="category">
                    <?php
                    // Ambil kategori dari database
                    $conn = open_connection();
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_category'] . "'>" . $row['name_category'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="image" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">body</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
</body>

</html>
