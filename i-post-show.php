<?php
session_start();

// include 'i-controller.php';
require 'controller/i-controller.php';

// Ambil id_post dari parameter URL
$id_post = isset($_GET['id_post']) ? $_GET['id_post'] : null;

if ($id_post === null) {
    die("ID Post tidak tersedia.");
}

// Ambil detail postingan menggunakan fungsi baru
$post = get_post_details($id_post);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/i-post-show.css">
</head>

<body>

    <?php
    include 'view/navbar.php';
    ?>

    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3"><?= htmlspecialchars($post['title']); ?></h1>

                <p class="blog-meta">
                    By: <span class="username"><?= htmlspecialchars($post['name_user']); ?></span>
                    in
                    <span class="category"><?= htmlspecialchars($post['name_category']); ?></span>
                </p>

                <?php if (!empty($post['image'])) : ?>
                    <div class="mx-auto">
                        <img src="assets/img/<?= htmlspecialchars($post['image']); ?>" alt="<?= htmlspecialchars($post['title']); ?>" class="img-fluid mt-3">
                    </div>
                <?php endif; ?>

                <article class="my-4 fs-5">
                    <?= $post['body']; ?>
                </article>

                <a class="btn btn-primary mt-3 d-print-none" href="index.php">Kembali</a>
                <button class="btn btn-primary mt-3 d-print-none" onclick="window.print()">Cetak Halaman</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
