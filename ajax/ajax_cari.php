<?php 
    require '../i-controller.php';
    // $keyword = $_GET['keyword'];
    
    $post = cari($_GET['keyword']);

    $first_post = array_shift($post);

?>



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