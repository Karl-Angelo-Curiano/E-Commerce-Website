<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#212529;
            position:fixed;
            left:0;
            top:0;
            padding-top:20px;
        }

        .sidebar h3{
            color:#fff;
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            color:#fff;
            text-decoration:none;
            display:block;
            padding:12px 20px;
        }

        .sidebar a:hover{
            background:#343a40;
        }

        .content{
            margin-left:250px;
        }

        .topbar{
            background:#fff;
            padding:15px 25px;
            box-shadow:0 2px 5px rgba(0,0,0,.1);
        }

        .card{
            border:none;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<!-- Sidebar -->

<div class="sidebar">

    <h3>MyShop Admin</h3>

    <a href="/admin">🏠 Dashboard</a>
    <a href="/products">📦 Products</a>
    <a href="/categories">📂 Categories</a>
    <a href="/orders">🛒 Orders</a>
    <a href="/payments">💳 Payments</a>
    <a href="/logout">🚪 Logout</a>

</div>

<!-- Content -->

<div class="content">

    <!-- Topbar -->

    <div class="topbar d-flex justify-content-between">

        <h4>Dashboard</h4>

        <strong>
            Welcome,
            <?= auth()->user()->username ?>
        </strong>

    </div>

    <div class="container-fluid mt-4">

        <div class="row">

            <div class="col-md-3 mb-4">

                <div class="card bg-primary text-white">

                    <div class="card-body">

                        <h5>Total Products</h5>

                        <h2><?= $totalProducts ?></h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card bg-success text-white">

                    <div class="card-body">

                        <h5>Total Orders</h5>

                        <h2><?= $totalOrders ?></h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card bg-warning text-dark">

                    <div class="card-body">

                        <h5>Total Customers</h5>

                        <h2><?= $totalCustomers ?></h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card bg-danger text-white">

                    <div class="card-body">

                        <h5>Total Sales</h5>

                        <h2>₱<?= number_format($totalSales, 2) ?></h2>

                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <h5>Welcome to the Admin Dashboard</h5>
            </div>

            <div class="card-body">

                <p>
                    Use the sidebar to manage products, categories,
                    orders, payments, and other parts of your
                    e-commerce system.
                </p>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>