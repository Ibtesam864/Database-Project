<?php
session_start();
include '../db_connection.php';

$query = "SELECT * FROM leases";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leases List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body style="background-color: #FFE5B4;">
    <?php include '../navbar.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4">Leases List</h2>
        <table class="table table-bordered">
            <thead>
                <?php
                if (!isset($_SESSION(['user_id']))) {
                    echo
                    "<tr>
                        <th>Lease ID</th>
                        <th>Tenant ID</th>
                        <th>Property ID</th>
                        <th>Lease Start</th>
                        <th>Lease End</th>
                        <th>Rent Amount</th>
                    </tr>";
                } else {
                    echo
                    "<tr>
                        <th>Lease ID</th>
                        <th>Tenant ID</th>
                        <th>Property ID</th>
                        <th>Lease Start</th>
                        <th>Lease End</th>
                        <th>Rent Amount</th>
                        <th>Actions</th>
                    </tr>";
                }
                ?>
            </thead>
            <tbody>
                <?php
                while ($lease = mysqli_fetch_assoc($result)) {
                    echo
                    "<tr>
                        <td>{$lease['lease_id']}</td>
                        <td>{$lease['tenant_id']}</td>
                        <td>{$lease['property_id']}</td>
                        <td>{$lease['lease_start']} to {$lease['lease_end']}</td>
                        <td>{$lease['rent_amount']}</td>
                    </tr>";

                    if (isset($_SESSION['user_id'])) {
                        echo
                        "<td>
                            <a href='https://localhost/Real%20Estate%20System/lease%20management/edit_lease.php?lease_id={$lease['lease_id']}' class='btn btn-warning btn-sm'>Edit</a> |
                            <a href='https://localhost/Real%20Estate%20System/lease%20management/delete_lease.php?lease_id={$lease['lease_id']}' onclick='return confirm(\"Are you sure?\")' class='btn btn-danger btn-sm'>Delete</a>
                        </td>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include '../db_connection.php';

$result = mysqli_query($conn, "SELECT * FROM leases");

echo "<h2>List of Leases</h2>";
echo "<table border='1'>
        <tr>
            <th>Lease ID</th>
            <th>Tenant ID</th>
            <th>Property ID</th>
            <th>Lease Start</th>
            <th>Lease End</th>
            <th>Rent Amount</th>
            <th>Actions</th>
        </tr>";

while ($lease = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$lease['lease_id']}</td>
            <td>{$lease['tenant_id']}</td>
            <td>{$lease['property_id']}</td>
            <td>{$lease['lease_start']}</td>
            <td>{$lease['lease_end']}</td>
            <td>{$lease['rent_amount']}</td>
            <td>
                <a href='edit_lease.php?id={$lease['lease_id']}'>Edit</a> |
                <a href='delete_lease.php?id={$lease['lease_id']}'>Delete</a>
            </td>
        </tr>";
}
echo "</table>";
