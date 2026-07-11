<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .register-card{
            max-width:500px;
            margin:50px auto;
            border:none;
            border-radius:15px;
            box-shadow:0 8px 20px rgba(0,0,0,.15);
        }

        .register-header{
            background:#212529;
            color:white;
            text-align:center;
            padding:20px;
            border-radius:15px 15px 0 0;
        }

        .btn-register{
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
                    <a class="nav-link active" href="/register">Register</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- Register Form -->
<div class="container">

    <div class="card register-card">

        <div class="register-header">
            <h3>Create Account</h3>
            <p class="mb-0">Join MyShop today</p>
        </div>

        <div class="card-body p-4">

            <form action="/register" method="post">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Enter your full name"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Enter your email"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Create a password"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="confirm_password"
                        placeholder="Confirm your password"
                        required>
                </div>

                <button type="submit" class="btn btn-dark btn-register">
                    Register
                </button>

            </form>

            <div class="text-center mt-4">
                Already have an account?
                <a href="/login">Login here</a>
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>