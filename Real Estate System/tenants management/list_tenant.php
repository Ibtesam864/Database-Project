<?php
session_start();
include '../db_connection.php';

$query = "SELECT * FROM tenants";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenants List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container my-5">
        <h2 class="mb-4">Tenants List</h2>
        <table class="table table-bordered">
            <thead>
                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo
                    "<tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Lease Period</th>
                        <th>Rent</th>
                    </tr>";
                } else {
                    echo
                    "<tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Lease Period</th>
                        <th>Rent</th>
                        <th>Actions</th>
                    </tr>";
                }
                ?>
            </thead>
            <tbody>
                <?php
                while ($tenant = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$tenant['tenant_name']}</td>
                        <td>{$tenant['tenant_contact']}</td>
                        <td>{$tenant['tenant_email']}</td>
                        <td>{$tenant['lease_start']} to {$tenant['lease_end']}</td>
                        <td>{$tenant['rent_amount']}</td>";

                    if (isset($_SESSION['user_id'])) {
                        echo
                        "<td>
                            <a href='https://localhost/Real%20Estate%20System/tenants%20management/edit_tenant.php?tenant_id={$tenant['tenant_id']}' class='btn btn-warning btn-sm'>Edit</a> |
                            <a href='https://localhost/Real%20Estate%20System/tenants%20management/delete_tenant.php?tenant_id={$tenant['tenant_id']}' onclick='return confirm(\"Are you sure?\")' class='btn btn-danger btn-sm'>Delete</a>
                            </td>";
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>