<?php
session_start();
include('../db_connection.php');

$query = "SELECT COUNT(*) AS total_users FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_styling.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../admin/admin_pic.png">
</head>

<body class="admin_body">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active ll" aria-current="page" href="http://localhost/Real%20Estate%20System/admin/admin_panel.php" style="color: #E0E0E0;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active ll" aria-current="page" href="http://localhost/Real%20Estate%20System/admin/display_users.php" style="color: #E0E0E0;">Users</a>
                    </li>
                </ul>
                <a href="http://localhost/Real%20Estate%20System/admin/processes/process_admin_exit.php" class="btn btn-danger">Exit Admin Panel</a>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="mb-4 body">Welcome To Admin Panel</h2>
        <hr>
        <table class="custom-table table-bordered">
            <thead>
                <tr>
                    <th>Total Users</th>
                    <th>Active Users</th>
                    <th>Total Properties</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_users; ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>