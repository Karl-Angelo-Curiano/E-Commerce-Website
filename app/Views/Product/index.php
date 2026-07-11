<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/">MyShop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/products">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product List</h2>

        <a href="/products/create" class="btn btn-success">
            Add Product
        </a>
    </div>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category ID</th>
                <th width="220">Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>

                <tr>

                    <td><?= $product['id']; ?></td>

                    <td>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= $product['image']; ?>" width="80" height="80" style="object-fit:cover;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>

                    <td><?= esc($product['name']); ?></td>

                    <td><?= esc($product['description']); ?></td>

                    <td>₱<?= number_format($product['price'],2); ?></td>

                    <td><?= $product['stock']; ?></td>

                    <td><?= $product['category_id']; ?></td>

                    <td>

                        <a href="/products/<?= $product['id']; ?>" class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="/products/edit/<?= $product['id']; ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="/products/delete/<?= $product['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this product?')">
                            Delete
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="8" class="text-center">
                    No products found.
                </td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>