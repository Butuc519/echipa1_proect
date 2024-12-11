<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store - Create Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #f3f4f7, #e9ecef);
            font-family: 'Arial', sans-serif;
        }

        .container.a {
            margin-top: 50px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
            font-weight: bold;
        }

        .form-container label {
            font-weight: bold;
            color: #555;
        }

        .form-container .form-control,
        .form-container .form-select {
            border-radius: 10px;
            box-shadow: none;
        }

        .form-container .form-control:focus,
        .form-container .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .form-container .form-control::placeholder {
            color: #aaa;
        }

        .form-container .btn {
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-container .btn-dark {
            background-color: #343a40;
            color: #fff;
            border: none;
        }

        .form-container .btn-dark:hover {
            background-color: #212529;
            transform: translateY(-3px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .form-container .mb-3 {
            margin-bottom: 25px;
        }

        .form-container .file-input-label {
            background-color: #e9ecef;
            border: 2px dashed #ccc;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container .file-input-label:hover {
            background-color: #dfe2e6;
        }

        .form-container .file-input-label input[type="file"] {
            display: none;
        }

        .form-container .help-text {
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container a">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2>Add New Product</h2>
                    <!-- Formular pentru crearea produsului -->
                    <form action="/products/store" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="imagine" class="file-input-label">
                                <input type="file" name="imagine" id="imagine" accept="image/*" required>
                                <i class="bi bi-upload"></i> Click to Upload Product Image
                            </label>
                            <p class="help-text">Supported formats: JPEG, PNG</p>
                        </div>
                        <div class="mb-3">
                            <label for="nume">Product Name</label>
                            <input type="text" name="nume" id="nume" class="form-control"
                                placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label for="descriere">Description</label>
                            <textarea name="descriere" id="descriere" class="form-control" rows="4"
                                placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pret">Price</label>
                            <input type="number" name="pret" id="pret" class="form-control"
                                placeholder="Enter price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="stoc">Stock</label>
                            <input type="number" name="stoc" id="stoc" class="form-control"
                                placeholder="Enter stock quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorie_id">Category</label>
                            <select name="categorie_id" id="categorie_id" class="form-select" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->id ?>"><?= $category->nume ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
