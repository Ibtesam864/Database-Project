<?php
session_start();
include '../db_connection.php';

if (isset($_SESSION['client_id'])) {
    $logged_in_user_id = $_SESSION['client_id'];
} elseif (isset($_SESSION['agent_id'])) {
    $logged_in_user_id = $_SESSION['agent_id'];
} elseif (isset($_SESSION['tenant_id'])) {
    $logged_in_user_id = $_SESSION['tenant_id'];
} else {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in."));
    exit();
}

$query = "SELECT * FROM payments";
$result = mysqli_query($conn, $query);

// Check for successful query execution
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch all payments into an array
$payments = [];
while ($payment = mysqli_fetch_assoc($result)) {
    $payments[] = $payment;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include '../navbar.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4">Payments List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Lease ID</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($payments) > 0) {
                    foreach ($payments as $payment) {
                        echo "<tr>
                            <td>{$payment['payment_id']}</td>
                            <td>{$payment['lease_id']}</td>
                            <td>{$payment['payment_date']}</td>
                            <td>{$payment['amount']}</td>
                            <td>{$payment['payment_method']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No payments found.</td></tr>";
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