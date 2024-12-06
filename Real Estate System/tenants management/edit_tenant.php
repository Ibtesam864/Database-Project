<?php
// Start the session (if needed)
session_start();

// Include the database connection
include '../db_connection.php';

// Ensure the 'tenant_id' parameter exists in the URL
if (isset($_GET['tenant_id'])) {
    $tenant_id = $_GET['tenant_id'];

    // Fetch existing tenant data
    $query = "SELECT * FROM tenants WHERE tenant_id = $tenant_id";
    $result = mysqli_query($conn, $query);

    // Check if the tenant exists
    if (mysqli_num_rows($result) > 0) {
        $tenant = mysqli_fetch_assoc($result);

        // Process the form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $lease_start = $_POST['lease_start'];
            $lease_end = $_POST['lease_end'];
            $rent_amount = $_POST['rent_amount'];

            // Update the tenant in the database
            $update_query = "UPDATE tenants SET tenant_name='$name', tenant_contact='$contact', tenant_email='$email', lease_start='$lease_start', lease_end='$lease_end', rent_amount='$rent_amount' WHERE tenant_id=$tenant_id";

            if (mysqli_query($conn, $update_query)) {
                header("Location: list_tenent.php?status=updated");
                exit();
            } else {
                echo "Error updating tenant: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Tenant not found.";
    }
} else {
    echo "No tenant ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #FFE5B4;">
    <?php include '../navbar.php'; ?>
    <div class="container my-5">
        <h2>Edit Tenant</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $tenant['tenant_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $tenant['tenant_contact']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $tenant['tenant_email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lease_start" class="form-label">Lease Start Date</label>
                <input type="date" class="form-control" id="lease_start" name="lease_start" value="<?php echo $tenant['lease_start']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lease_end" class="form-label">Lease End Date</label>
                <input type="date" class="form-control" id="lease_end" name="lease_end" value="<?php echo $tenant['lease_end']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="rent_amount" class="form-label">Rent Amount</label>
                <input type="number" class="form-control" id="rent_amount" name="rent_amount" value="<?php echo $tenant['rent_amount']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Tenant</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>