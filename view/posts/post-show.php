<?php
// session_start();

// include 'koneksi.php';
// require '../../controller/koneksi.php';
require '../../controller/posts-controller.php';

$user_role = $_SESSION['role'];

$conn = open_connection();

// cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // jika belum maka redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Ambil id_post dari parameter URL
$id_post = isset($_GET['id_post']) ? $_GET['id_post'] : null;

if ($id_post === null) {
    echo "ID Post tidak tersedia.";
    exit;
}

// Query untuk mendapatkan detail postingan berdasarkan id_post
$sql = "SELECT posts.*, categories.name_category, users.name_user 
        FROM posts 
        JOIN categories ON posts.id_category = categories.id_category 
        JOIN users ON posts.id_user = users.id_user
        WHERE posts.id_post = '$id_post'";

$result = $conn->query($sql);

// Periksa apakah postingan ditemukan
if ($result && $result->num_rows > 0) {
    $post = $result->fetch_assoc();
} else {
    echo "Post tidak ditemukan.";
    exit;
}

$conn->close();

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
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="container">
            <div class="row my-3">
                <div class="col-lg-8">
                    <h1 class="mb-3"><?= htmlspecialchars($post['title']); ?></h1>

                    <a href="posts/posts.php" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke semua postingan</a>
                    <a href="posts/post-edit.php?id_post=<?= $id_post; ?>" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                    <!-- <form action="../controller/posts-controller.php" method="POST" class="d-inline">
                        <input type="hidden" name="action" value="delete_post">
                        <input type="hidden" name="id_post" value="<?= $id_post; ?>">
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')" type="submit"><span data-feather="x-circle" class="align-text-bottom"></span> Hapus</button>
                    </form> -->
                    <form action="" method="post" style="display:inline;" onsubmit="return confirmDelete()">
                        <button type="submit" class="btn btn-danger" name="hapus" value="<?= $post['id_post']; ?>">Hapus</button>
                    </form>

                    <?php if (!empty($post['image'])) : ?>
                        <div style="max-height: 350px; overflow:hidden">
                            <img src="../assets/img/<?= htmlspecialchars($post['image']); ?>" alt="<?= htmlspecialchars($post['title']); ?>" class="img-fluid mt-3">
                        </div>
                    <?php endif; ?>

                    <article class="my-3 fs-5">
                        <?= $post['body']; ?>
                    </article>

                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>