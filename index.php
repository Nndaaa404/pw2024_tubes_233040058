<?php
require 'controller/i-controller.php';

// Query untuk mengambil semua post dan mengurutkannya berdasarkan tanggal dibuat secara menurun
$post = query("SELECT posts.*, categories.name_category, users.name_user 
              FROM posts 
              JOIN categories ON posts.id_category = categories.id_category 
              JOIN users ON posts.id_user = users.id_user 
              ORDER BY created_at DESC");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $keyword = $_POST['keyword']; 
  if (empty($keyword)) {
    $post = query("SELECT posts.*, categories.name_category, users.name_user 
              FROM posts 
              JOIN categories ON posts.id_category = categories.id_category 
              JOIN users ON posts.id_user = users.id_user 
              ORDER BY created_at DESC");
  } else {
    $post = cari($_POST['keyword']);
  }
}

// Mengambil post pertama lalu di masukkan ke dalam variable $first_post
$first_post = array_shift($post);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resep Kita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
  <?php
  include 'view/navbar.php';
  ?>

  <div class="container mt-4">
    <h1 class="mb-3 text-center" style="font-weight: bold;">Selamat datang di website Resep Kita</h1>

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="" method="post" class="input-group mb-3">
          <input type="text" class="form-control keyword" placeholder="Search.." name="keyword" autocomplete="off">
          <button class="btn btn-primary tombol-cari" type="submit" name="cari">Search</button>
        </form>
      </div>
    </div>

    <div class="conajax">
      <?php if ($first_post || !empty($post)) : ?>
        <!-- Card Post Pertama -->
        <?php if ($first_post) : ?>
          <div class="card mb-4">
            <div class="img-container">
              <?php if (!empty($first_post['image'])) : ?>
                <img src="assets/img/<?= $first_post['image'] ?>" class="card-img-top" alt="#">
              <?php else : ?>
                <img src="https://source.unsplash.com/1200x400?food" class="card-img-top" alt="#">
              <?php endif; ?>
            </div>
            <div class="card-body text-center">
              <h3 class="card-title"><a href="#" class="text-decoration-none text-dark"><?= htmlspecialchars($first_post['title']) ?></a></h3>
              <p>
                <small class="text-muted">
                  By: <span class="fw-bold"><?= htmlspecialchars($first_post['name_user']) ?></span>
                  <?= time_elapsed_string($first_post['created_at']) ?>
                </small>
              </p>
              <p class="card-text"><?= htmlspecialchars($first_post['excerpt']) ?></p>
              <a href='i-post-show.php?id_post=<?= $first_post['id_post']; ?>' class="text-decoration-none btn btn-primary">Read more</a>
            </div>
          </div>
        <?php endif; ?>

        <!-- Card Post kedua -->
        <div class="container">
          <div class="row">
            <?php foreach ($post as $pst) : ?>
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a href="#" class="text-white text-decoration-none"><?= htmlspecialchars($pst['name_category']) ?></a>
                  </div>
                  <?php if (!empty($pst['image'])) : ?>
                    <img src="assets/img/<?= $pst['image'] ?>" class="card-img-top" alt="#">
                  <?php else : ?>
                    <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="#">
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($pst['title']) ?></h5>
                    <p>
                      <small class="text-muted">
                        By: <span class="fw-bold"><?= htmlspecialchars($pst['name_user']) ?></span>
                        <?= time_elapsed_string($pst['created_at']) ?>
                      </small>
                    </p>
                    <p class="card-text"><?= htmlspecialchars($pst['excerpt']) ?></p>
                    <a href='i-post-show.php?id_post=<?= $pst['id_post']; ?>' class="text-decoration-none btn btn-primary">Read more</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php else : ?>
        <p class="text-center">No posts found.</p>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>