<?php
session_start();
include '../db_connection.php';

$complaint_query = "SELECT * FROM maintenance_requests";
$result = mysqli_query($conn, $complaint_query);

// Test query execution
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Store the result into an array
$requests = [];
while ($request = mysqli_fetch_assoc($result)) {
    $requests[] = $request;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request List - REMS</title>
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../navbar.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4">Request List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Property ID</th>
                    <th>Tenant ID</th>
                    <th>Description</th>
                    <th>Request Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if we have any requests
                if (count($requests) > 0) {
                    foreach ($requests as $request) {
                        // Output data in each table row
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($request['request_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($request['property_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($request['tenant_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($request['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($request['request_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($request['status']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No data found.</td></tr>";
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