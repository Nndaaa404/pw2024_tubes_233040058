<?php
require 'posts-controller.php';

$user_role = $_SESSION['role'];

// jika tidak ada id di url
if (!isset($_GET['id_post'])) {
    header("location: posts.php");
}

// ambil id dari url
$id = $_GET['id_post'];

// query category berdasarkan id
$post = query("SELECT * FROM posts WHERE id_post = $id");

// cek apakah tombol ubah sudah di tekan
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
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
    <title>Edit Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
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

    <?php
    include 'dashboard/header.php';
    include 'dashboard/sidebar.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3">

        <div class="container col-lg-8 col-md-8 col-10">
            <h1>Edit Postingan</h1>

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit_post">
                <input type="hidden" name="id_post" value="<?= $post['id_post']; ?>">
                <input type="hidden" name="old_image" value="<?= $post['image']; ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $post['title']; ?>">
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
                                $selected = $row['id_category'] == $post['id_category'] ? 'selected' : '';
                                echo "<option value='" . $row['id_category'] . "' $selected>" . $row['name_category'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                    <img src="assets/img/<?= $post['image']; ?>" alt="Current Image" width="150">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <input id="body" type="hidden" name="body" value="<?= htmlspecialchars($post['body']); ?>">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
</body>

</html>

<?php
$conn->close();
?>