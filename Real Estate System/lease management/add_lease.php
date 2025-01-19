<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in to add a property."));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Lease</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Add Lease</h2>
        <form action="processes/process_add_lease.php" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Tenant ID</label>
                <input type="text" class="form-control" id="tenant_id" name="tenant_id" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property ID</label>
                <input type="text" class="form-control" id="property_id" name="property_id" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lease Start</label>
                <input type="date" class="form-control" id="lease_start" name="lease_start" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lease End</label>
                <input type="date" class="form-control" id="lease_end" name="lease_end" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Rent Amount</label>
                <input type="text" class="form-control" id="rent_amount" name="rent_amount" required>
            </div>
            <button type="submit" class="btn btn-primary mb-5" name="save">Add Lease</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>