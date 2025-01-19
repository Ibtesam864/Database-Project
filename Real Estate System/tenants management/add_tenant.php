<?php
session_start();

if (isset($_SESSION['agent_id'])) {
    $logged_in_user_id = $_SESSION['agent_id'];
} else {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in as an agent to add a tenant."));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container mt-5">
        <h2>Add New Tenant</h2>
        <form action="processes/process_add_tenant.php" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Tenant Name</label>
                <input type="text" class="form-control" id="tenant_name" name="tenant_name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tenant Contact</label>
                <input type="text" class="form-control" id="tenant_contact" name="tenant_contact">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tenant Email</label>
                <input type="text" class="form-control" id="tenant_email" name="tenant_email">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tenant Address</label>
                <input type="text" class="form-control" id="tenant_address" name="tenant_address">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property ID</label>
                <input type="text" class="form-control" id="property_id" name="property_id">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lease Start</label>
                <input type="date" class="form-control" id="lease_start" name="lease_start">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lease End</label>
                <input type="date" class="form-control" id="lease_end" name="lease_end">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Rent Amount</label>
                <input type="text" class="form-control" id="rent_amount" name="rent_amount">
            </div>
            <button type="submit" class="btn btn-primary mb-5" name="save">Add Tenant</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>