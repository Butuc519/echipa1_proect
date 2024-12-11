<?php
session_start();
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            font-family: 'Arial', sans-serif;
        }

        .container.a {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #ffffff, #f9f9f9);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.2rem;
            text-align: center;
            padding: 15px;
            border-radius: 12px 12px 0 0;
        }

        .card-body {
            text-align: center;
            padding: 20px;
        }

        .card-footer {
            background-color: #f1f1f1;
            border-radius: 0 0 12px 12px;
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.9rem;
            font-weight: bold;
            margin: 5px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-warning {
            color: #fff;
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .no-categories {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container a">
        <div class="row justify-content-center mb-4">
            <h3 class="text-center">Categories Overview</h3>
        </div>

        <?php if ($categories->count() > 0): ?>
            <div class="row">
                <?php foreach ($categories as $category): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <?= htmlspecialchars($category->nume) ?>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Category ID: <?= $category->id ?></p>
                                <?php if (isset($_SESSION['user_id']) && User::find($_SESSION['user_id'])->isAdmin()): ?>
                                    <a href="/categories/edit/<?= $category->id ?>" class="btn btn-warning">Edit</a>
                                    <form action="/categories/delete/<?= $category->id ?>" method="post" style="display:inline-block;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer">
                                Manage category efficiently.
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-categories">
                <p>No categories available</p>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this category?");
        }
    </script>
</body>

</html>
