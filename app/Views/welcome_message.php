<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .hero{
            height:70vh;
            background:url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1400&q=80') center/cover;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            text-align:center;
        }

        .hero h1{
            font-size:4rem;
            font-weight:bold;
            text-shadow:2px 2px 10px black;
        }

        .hero p{
            font-size:1.2rem;
            text-shadow:1px 1px 5px black;
        }

        .card img{
            height:220px;
            object-fit:cover;
        }

        footer{
            background:#212529;
            color:white;
            padding:20px;
            margin-top:60px;
        }
    </style>
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">MyShop</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= url_to('register') ?>">
                        Register
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>

<!-- Hero -->

<section class="hero">
    <div>
        <h1>Welcome to MyShop</h1>
        <p>Your one-stop online shopping destination.</p>

        <a href="/login" class="btn btn-warning btn-lg mt-3">
            Login to Shop
        </a>
    </div>
</section>

<!-- Featured Products -->

<div class="container my-5">

    <h2 class="text-center mb-4">Featured Products</h2>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80">
                <div class="card-body text-center">
                    <h5>Nike Shoes</h5>
                    <p class="text-primary fw-bold">$89.99</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80">
                <div class="card-body text-center">
                    <h5>Smart Watch</h5>
                    <p class="text-primary fw-bold">$149.99</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=600&q=80">
                <div class="card-body text-center">
                    <h5>Smartphone</h5>
                    <p class="text-primary fw-bold">$799.99</p>
                </div>
            </div>
        </div>

    </div>

</div>

<footer class="text-center">
    <p>&copy; <?= date('Y') ?> MyShop. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>