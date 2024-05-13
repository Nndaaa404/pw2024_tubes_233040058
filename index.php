<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resep Kita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- <style>
    body {
      color: #52616B;
      background-color: #F0F5F9;
    }

    .navbar-brand {
      color: #52616B;
      transition: color 0.3s ease;
    }

    .navbar-brand:hover {
      color: #3a4852 ;
    }

    .card {
      background-color: #C9D6DF;
    }
  </style> -->
</head>

<body>
  <nav class="navbar navbar-expand-lg p-3" style="background-color: #C9D6DF;">
    <div class="container-fluid mx-lg-5 mx-md-3 mx-sm-3">
      <a class="navbar-brand" style="font-family: Poppins , sans-serif; font-weight: 900; margin-right:50px;" href="#">Resep Kita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-4 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost:8080/Tugas-Besar-PW/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex ">
          <button type="button" class="btn btn-outline-light">Sign in</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="mb-3 text-center">Selamat datang di website Resep Kita</h1>

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="/posts">
          <input type="text" class="form-control mb-3" placeholder="Search.." name="search" value="">
          <button class="btn btn-primary d-none" type="submit">Search</button>
        </form>
      </div>
    </div>

    <div class="card mb-3">
      <img src="https://source.unsplash.com/1200x400?food" class="card-img-top" alt="{{ $posts[0]->category->name }}">

      <div class="card-body text-center">
        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">INI JUDUL YA!!</a></h3>
        <p>
          <small class="text-muted">
            By: <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">Ananda Rizky Maulana</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">Resep</a>
            2 minutes ago
          </small>
        </p>
        <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>

        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">Resep Kita</a>
            </div>
            <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="{{ $post->category->name }}">

            <div class="card-body">
              <h5 class="card-title">Adit Masak Mie</h5>
              <p>
                <small class="text-muted">
                  By: <a href="/posts?author{{ $post->author->username }}" class="text-decoration-none">Nndaaa</a>
                  2 minutes ago
                </small>
              </p>
              <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">Resep Kita</a>
            </div>
            <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="{{ $post->category->name }}">

            <div class="card-body">
              <h5 class="card-title">Adit Masak Mie</h5>
              <p>
                <small class="text-muted">
                  By: <a href="/posts?author{{ $post->author->username }}" class="text-decoration-none">Nndaaa</a>
                  2 minutes ago
                </small>
              </p>
              <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">Resep Kita</a>
            </div>
            <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="{{ $post->category->name }}">

            <div class="card-body">
              <h5 class="card-title">Adit Masak Mie</h5>
              <p>
                <small class="text-muted">
                  By: <a href="/posts?author{{ $post->author->username }}" class="text-decoration-none">Nndaaa</a>
                  2 minutes ago
                </small>
              </p>
              <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">Resep Kita</a>
            </div>
            <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="{{ $post->category->name }}">

            <div class="card-body">
              <h5 class="card-title">Adit Masak Mie</h5>
              <p>
                <small class="text-muted">
                  By: <a href="/posts?author{{ $post->author->username }}" class="text-decoration-none">Nndaaa</a>
                  2 minutes ago
                </small>
              </p>
              <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">Resep Kita</a>
            </div>
            <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="{{ $post->category->name }}">

            <div class="card-body">
              <h5 class="card-title">Adit Masak Mie</h5>
              <p>
                <small class="text-muted">
                  By: <a href="/posts?author{{ $post->author->username }}" class="text-decoration-none">Nndaaa</a>
                  2 minutes ago
                </small>
              </p>
              <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 rounded-1" style="background-color: rgba(0, 0, 0, 0.7)">
              <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">Resep Kita</a>
            </div>
            <img src="https://source.unsplash.com/500x400?food" class="card-img-top" alt="{{ $post->category->name }}">

            <div class="card-body">
              <h5 class="card-title">Adit Masak Mie</h5>
              <p>
                <small class="text-muted">
                  By: <a href="/posts?author{{ $post->author->username }}" class="text-decoration-none">Nndaaa</a>
                  2 minutes ago
                </small>
              </p>
              <p class="card-text">A aperiam ut ut fugiat laudantium. Sunt sed quia vero. Necessitatibus odio deserunt necessitatibus. Architecto facere laudantium consequuntur illo reprehenderit voluptatem non.</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>