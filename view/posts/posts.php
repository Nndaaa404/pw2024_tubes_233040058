<?php
require '../../controller/posts-controller.php';

$user_role = $_SESSION['role'];

if ($_SESSION['role'] === 'admin') {
    $sql = "
        SELECT posts.*, categories.name_category, users.name_user 
        FROM posts 
        JOIN categories ON posts.id_category = categories.id_category 
        JOIN users ON posts.id_user = users.id_user
    ";
    $posts = query($sql);
    // var_dump($posts['password']);die();
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "
        SELECT posts.*, categories.name_category, users.name_user 
        FROM posts 
        JOIN categories ON posts.id_category = categories.id_category 
        JOIN users ON posts.id_user = users.id_user
        WHERE posts.id_user = $user_id
    ";
    $posts = query($sql);
}

if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];
    $result = hapus($id);
    if ($result === -1) {
        echo "<script>
                alert('Gagal menghapus Post');
                document.location.href = 'posts.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Post berhasil dihapus');
                document.location.href = 'posts.php';
              </script>";
        exit();
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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/table.css">
    <link rel="stylesheet" href="../../assets/css/posts.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <base href="http://localhost:8080/Tugas-Besar-PW/view/">
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus Post?');
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
            <h1>Daftar Postingan</h1>

            <a href="posts/post-add.php" class="btn btn-primary mb-3">Create new post</a>

            <div class="col-lg-9 col-md-12">
                <table class="table table-striped table-bordered rounded-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $index => $post) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $index + 1; ?></th>
                                <td><?= $post['title']; ?></td>
                                <td><?= $post['name_category']; ?></td>
                                <td><?= $post['name_user']; ?></td>
                                <td class="text-center">
                                    <a href="posts/post-show.php?id_post=<?= $post['id_post']; ?>" class="badge text-bg-success text-decoration-none"><span data-feather="eye" class="align-text-bottom"></span></a>
                                    <a href="posts/post-edit.php?id_post=<?= $post['id_post']; ?>" class="badge text-bg-warning text-decoration-none"><span data-feather="edit" class="align-text-bottom"></span></a>
                                    <form action="" method="post" style="display:inline;" onsubmit="return confirmDelete()">
                                        <button type="submit" class="badge text-bg-danger text-decoration-none border-0" name="hapus" value="<?= $post['id_post']; ?>"><span data-feather="x-circle" class="align-text-bottom"></span></button>
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