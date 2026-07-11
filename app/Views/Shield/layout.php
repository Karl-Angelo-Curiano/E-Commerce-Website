<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->renderSection('title') ?> - MyShop</title>

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
            color:#fff;
            text-align:center;
            padding:20px;
            border-radius:15px 15px 0 0;
        }

        .btn-dark{
            width:100%;
        }
    </style>

    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="<?= base_url() ?>">
            MyShop
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">
                        Home
                    </a>
                </li>

                <?php if (auth()->loggedIn()) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('logout') ?>">
                            Logout
                        </a>
                    </li>

                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('login') ?>">
                            Login
                        </a>
                    </li>

                    <?php if (setting('Auth.allowRegistration')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('register') ?>">
                                Register
                            </a>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>

            </ul>

        </div>

    </div>
</nav>

<main class="container">
    <?= $this->renderSection('main') ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->renderSection('pageScripts') ?>

</body>
</html>