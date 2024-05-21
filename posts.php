<?php
require_once "posts-controller.php";
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
        function confirmDelete(form) {
            if (confirm("Apakah Anda yakin ingin menghapus postingan ini?")) {
                form.submit();
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Daftar Postingan</h1>

        <a href="post-add.php" class="btn btn-primary mb-3">Create new post</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $index => $post) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= $post['title']; ?></td>
                        <td><?= $post['name_category']; ?></td>
                        <td><?= $post['name_user']; ?></td>
                        <td>
                            <a href="post-show.php?id_post=<?= $post['id_post']; ?>" class="badge text-bg-warning text-decoration-none">Lihat</a>
                            <a href="post-edit.php?id_post=<?= $post['id_post']; ?>" class="badge text-bg-danger text-decoration-none">Edit</a>
                            <form action="posts-controller.php" method="post" style="display:inline;" onsubmit="return confirmDelete(this);">
                                <input type="hidden" name="action" value="delete_post">
                                <input type="hidden" name="id_post" value="<?= $post['id_post']; ?>">
                                <button type="button" class="badge text-bg-danger text-decoration-none border-0" onclick="confirmDelete(this.form)">Hapus</button>
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