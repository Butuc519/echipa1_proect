<?php
session_start();
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container.a {
            margin-top: 30px;
        }

        .filter-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: 100%;
        }

        .filter-container h5 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            width: 90%;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background: #fff;
            width: 300px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #555;
            font-size: 0.9rem;
        }

        .card-footer {
            text-align: center;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
            padding: 10px;
            font-size: 0.85rem;
            color: #777;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .row {
            gap: 20px;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container a">
        <div class="row">
            <!-- Filtrare -->
            <div class="col-md-3">
                <div class="filter-container">
                    <h5>Filters</h5>
                    <form action="/products" method="GET">
                        <div class="mb-3">
                            <label for="query" class="form-label">Search:</label>
                            <input type="text" name="query" id="query" class="form-control"
                                value="<?= htmlspecialchars($query) ?>" placeholder="Search product...">
                        </div>
                        <div class="mb-3">
                            <label for="categorie_id" class="form-label">Category:</label>
                            <select name="categorie_id" id="categorie_id" class="form-select">
                                <option value="">All Categories</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->id ?>" <?= isset($_GET['categorie_id']) && $_GET['categorie_id'] == $category->id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category->nume) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </form>
                </div>
            </div>

            <!-- Afișare Produse -->
            <div class="col-md-9">
                <div class="product-container">
                    <?php if (count($products) > 0): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="card">
                                <img src="/uploads/<?= htmlspecialchars($product->imagine) ?>" alt="Product Image" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($product->nume) ?></h5>
                                    <p class="card-text">
                                        <?= htmlspecialchars(substr($product->descriere, 0, 100)) ?>...
                                    </p>
                                    <p class="text-muted"><strong><?= number_format($product->pret, 2) ?> MLD</strong></p>
                                    <?php if (isset($_SESSION['user_id']) && User::find($_SESSION['user_id'])->isAdmin()): ?>
                                        <a href="/products/edit/<?= $product->id ?>" class="btn btn-warning">Edit</a>
                                        <form action="/products/delete/<?= $product->id ?>" method="POST" class="d-inline"
                                            onsubmit="return confirmDelete()">
                                            <input type="hidden" name="_METHOD" value="DELETE" />
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                    <a href="/products/show/<?= $product->id ?>" class="btn btn-primary">Details</a>
                                </div>
                                <div class="card-footer">
                                    Added: <?= date('d M Y', strtotime($product->created_at)) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">No products available</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
