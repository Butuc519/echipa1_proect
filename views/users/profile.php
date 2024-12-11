<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fb;
            font-family: 'Arial', sans-serif;
        }

        .profile-container {
            margin: 50px auto;
            max-width: 900px;
            background: linear-gradient(135deg, #ffffff, #f9f9f9);
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid #007bff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header h3 {
            margin-top: 15px;
            color: #333;
        }

        .profile-header p {
            color: #555;
        }

        .profile-details {
            margin-top: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-details h5 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .profile-details table {
            width: 100%;
            margin-top: 10px;
        }

        .profile-details th {
            text-align: left;
            color: #555;
            width: 30%;
        }

        .profile-details td {
            color: #333;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>
    <div class="profile-container">
        <!-- Profil Header -->
        <div class="profile-header">
            <img src="https://via.placeholder.com/120" alt="User Profile Picture">
            <h3><?= htmlspecialchars($user->nume) ?></h3>
            <p class="text-muted"><?= htmlspecialchars($user->email) ?></p>
        </div>

        <!-- Detalii Profil -->
        <div class="profile-details">
            <h5>Profile Information</h5>
            <table class="table table-borderless">
                <tr>
                    <th>First Name:</th>
                    <td><?= htmlspecialchars($user->nume) ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?= htmlspecialchars($user->email) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>