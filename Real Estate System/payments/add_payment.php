<?php
session_start();

if (!isset($_SESSION['tenant_id'])) {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in as a tenant."));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container mt-5">
        <h2>Make Payment</h2>
        <form action="processes/process_add_tenant.php" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Payment Amount</label>
                <input type="text" class="form-control" id="amount" name="amount">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Payment Method</label>
                <input type="text" class="form-control" id="method" name="method">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Payment Date</label>
                <input type="text" class="form-control" id="payment_date" name="payment_date">
            </div>
            <button type="submit" class="btn btn-primary mb-5" name="save">Make Payment</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>