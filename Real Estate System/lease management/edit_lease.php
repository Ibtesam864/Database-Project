<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Lease</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php
    include '../db_connection.php';
    $lease_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM leases WHERE lease_id = $lease_id");
    $lease = mysqli_fetch_assoc($result);
    ?>

    <?php include '../navbar.php'; ?>
    <h2>Edit Lease</h2>
    <form action="process_edit_lease.php" method="POST">
        <input type="hidden" name="lease_id" value="<?= $lease['lease_id'] ?>">
        Tenant ID: <input type="text" name="tenant_id" value="<?= $lease['tenant_id'] ?>"><br>
        Property ID: <input type="text" name="property_id" value="<?= $lease['property_id'] ?>"><br>
        Lease Start: <input type="date" name="lease_start" value="<?= $lease['lease_start'] ?>"><br>
        Lease End: <input type="date" name="lease_end" value="<?= $lease['lease_end'] ?>"><br>
        Rent Amount: <input type="text" name="rent_amount" value="<?= $lease['rent_amount'] ?>"><br>
        <button type="submit">Update Lease</button>
    </form>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>