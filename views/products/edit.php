<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-container .form-control,
        .form-container .form-select {
            border-radius: 10px;
            box-shadow: none;
        }

        .form-container .btn {
            width: 100%;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-container .btn-dark {
            background-color: #343a40;
            border: none;
        }

        .form-container .btn-dark:hover {
            background-color: #23272b;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
            color: #555;
        }

        .form-container .mb-3 {
            margin-bottom: 20px;
        }

        .form-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-container .form-control::placeholder {
            color: #888;
        }

        .form-container .btn-sm {
            width: auto;
            margin-top: 20px;
        }

        .form-container .form-select,
        .form-control {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>

    <div class="container">
        <div class="row py-2 justify-content-center h5">
            <h3 class="text-center">Edit Product</h3>
        </div>
        <div class="row">
            <div class="col-md-8 m-auto form-container">
                <!-- Formular pentru editarea produsului -->
                <form action="/products/update/<?= $product->id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_METHOD" value="PUT" />
                    <div class="mb-3">
                        <label for="imagine">Product Image</label>
                        <input type="file" name="imagine" id="imagine" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Current Image</label><br>
                        <img src="../public/uploads/<?= htmlspecialchars($product->imagine) ?>" alt="Product Image"
                            class="img-fluid" style="max-height: 200px;">
                    </div>

                    <div class="mb-3">
                        <label for="nume">Product Name</label>
                        <input type="text" name="nume" id="nume" class="form-control" value="<?= $product->nume ?>"
                            placeholder="Enter product name" required>
                    </div>
                    <div class="mb-3">
                        <label for="descriere">Description</label>
                        <textarea name="descriere" id="descriere" class="form-control"
                            placeholder="Enter product description" required><?= $product->descriere ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pret">Price</label>
                        <input type="number" name="pret" id="pret" class="form-control" step="0.01"
                            value="<?= $product->pret ?>" placeholder="Enter price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stoc">Stock</label>
                        <input type="number" name="stoc" id="stoc" class="form-control" value="<?= $product->stoc ?>"
                            placeholder="Enter stock quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorie_id">Category</label>
                        <select name="categorie_id" id="categorie_id" class="form-select" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?= $product->categorie_id == $category->id ? 'selected' : '' ?>><?= $category->nume ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark btn-sm">Update Product</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>