<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 mt-lg-5 mt-md-5" aria-current="page" href="home-dashboard.php">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Dashboard
                    </a>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-body-secondary text-uppercase">
                        <span>User</span>
                    </h6>
                    <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="posts/posts.php">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Posts
                    </a>
                    <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="profile/profile.php">
                        <span data-feather="user" class="align-text-bottom"></span>
                        Profile
                    </a>
                </li>
            </ul>

            <?php if ($user_role == 'admin') : ?>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Administrator</span>
                </h6>
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="categories/categories.php">
                            <span data-feather="grid" class="align-text-bottom"></span>
                            Categories
                        </a>
                        <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="users/users.php">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Users
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
                        <span data-feather="log-out" class="align-text-bottom"></span>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>