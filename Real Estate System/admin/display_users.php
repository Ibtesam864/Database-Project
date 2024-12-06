<?php
session_start();
include '../db_connection.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="admin_pic.png">
    <link rel="stylesheet" href="admin_styling.css">
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
    <div class="container my-5" style="color: #E0E0E0;">
        <h2 class="mb-4">Users</h2>
        <table class="custom-table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user = mysqli_fetch_assoc($result)) {
                    echo
                    "<tr>
                            <td>{$user['username']}</td>
                            <td>{$user['password']}</td>
                            <td>{$user['created_at']}</td>
                            <td>
                                <a href='https://localhost/Real%20Estate%20System/admin/processes/process_delete_user.php?user_id={$user['id']}' onclick='return confirm(\"Are you sure you want to remove the user ?\")' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                         </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>