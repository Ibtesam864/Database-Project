<?php
session_start();

if (isset($_SESSION['client_id'])) {
    $logged_in_user_id = $_SESSION['client_id'];
} else {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in to add a property."));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container mt-5">
        <h2>Add New Property</h2>
        <form action="processes/process_add_property.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Property Name</label>
                <input type="text" class="form-control" id="property_name" name="property_name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Address</label>
                <input type="text" class="form-control" id="property_address" name="property_address" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Price</label>
                <input type="text" class="form-control" id="property_price" name="property_price" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Type</label>
                <input type="text" class="form-control" id="property_type" name="property_type" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Size</label>
                <input type="text" class="form-control" id="property_size" name="property_size" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Status</label>
                <input type="text" class="form-control" id="propertystatus" name="property_status" required>
            </div>
            <div class="mb-3">
                <label for="featured">Feature this property ? (You will be charged)</label>
                <select name="featured" id="featured" class="form-select mb-4" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
            </div>
            <div class="mb-3">
                <label for="property_image">Upload Image:</label>
                <input type="file" name="property_image" id="property_image" required>
            </div>
            <button type="submit" class="btn btn-primary mb-5" name="save">Add Property</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>