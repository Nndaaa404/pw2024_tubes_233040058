<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resep Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            color: #52616B;
            background-color: #F0F5F9;
            /* padding-top: 4rem;
            padding-bottom: 4rem; */
            padding: 1.5rem 0 1.5rem 0;
            
        }

        .navbar-brand {
            color: #52616B;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #3a4852;
        }

        .card {
            background-color: #C9D6DF;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: 5px;
        }
        .form-signin input[type="email"] {
            margin-bottom: 5px;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="d-flex align-items-center">

    <div class="container my-5">
        <div class="p-5 text-center">

            <div class="form-signin w-100 m-auto">
                <form>
                    <h1 class="h3 mb-3 fw-normal">Please Register</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Ethan James Johnson">
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="chefethanj">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>