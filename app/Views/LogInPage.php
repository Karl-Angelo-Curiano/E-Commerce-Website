<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .login-card{
            max-width:450px;
            margin:70px auto;
            border:none;
            border-radius:15px;
            box-shadow:0 8px 20px rgba(0,0,0,.15);
        }

        .login-header{
            background:#212529;
            color:white;
            text-align:center;
            padding:20px;
            border-radius:15px 15px 0 0;
        }

        .btn-dark{
            width:100%;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">MyShop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/login">Login</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- Login Form -->
<div class="container">

    <div class="card login-card">

        <div class="login-header">
            <h3>Login</h3>
            <p class="mb-0">Sign in to your account</p>
        </div>

        <div class="card-body p-4">

            <form action="/login" method="post">

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email"
                           class="form-control"
                           name="email"
                           placeholder="Enter your email"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="Enter your password"
                           required>
                </div>

                <button type="submit" class="btn btn-dark">
                    Login
                </button>

            </form>

            <div class="text-center mt-4">
                Don't have an account?
                <a href="/register">Register here</a>
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>