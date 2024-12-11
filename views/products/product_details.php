<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
            font-family: 'Arial', sans-serif;
        }

        .product-details {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .product-details h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .product-details img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .product-info p {
            line-height: 1.8;
            color: #555;
        }

        .product-actions {
            margin-top: 30px;
        }

        .btn {
            font-size: 1.1rem;
            padding: 12px 25px;
            border-radius: 8px;
            text-transform: uppercase;
            font-weight: bold;
            width: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .col-md-6 {
            flex: 1;
            padding: 15px;
        }

        .image-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-info strong {
            color: #007bff;
        }

        .wishlist-star {
            cursor: pointer;
            font-size: 2rem;
        }

        .wishlist-star.active {
            color: gold;
        }
    </style>
</head>

<body>

    <?php include '../views/navbar.php'; ?>

    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="product-details card shadow-lg p-4">
                <h1 class="text-center mb-4"><?= htmlspecialchars($product->nume) ?></h1>
                
                <div class="row">
                    <!-- Product Image -->
                    <div class="col-md-6 mb-3">
                        <div class="image-container text-center">
                            <img src="/uploads/<?= htmlspecialchars($product->imagine) ?>" alt="Product Image" class="img-fluid rounded border">
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-md-6">
                        <div class="product-info">
                            <p class="mb-2">
                                <strong>💬 Description:</strong>
                                <?= htmlspecialchars($product->descriere) ?>
                            </p>
                            <p class="mb-2">
                                <strong>💵 Price:</strong>
                                <span class="text-success fw-bold"><?= htmlspecialchars($product->pret) ?> Lei</span>
                            </p>
                            <p class="mb-2">
                                <strong>📦 Stock:</strong>
                                <?= htmlspecialchars($product->stoc) ?> units
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
