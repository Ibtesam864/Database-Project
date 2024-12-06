<?php
session_start();
include('../db_connection.php');

if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    $query = "SELECT * FROM properties WHERE id = '$property_id'";
    $result = mysqli_query($conn, $query);
    $property = mysqli_fetch_assoc($result);
} else {
    header("Location: list_properties.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body style="background-color: #FFE5B4;">
    <?php include('../navbar.php'); ?>
    <div class="container mt-5">
        <h2>Edit Property</h2>
        <form action="processes/process_edit_property.php" method="post">

            <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">

            <div class="mb-3">
                <label for="" class="form-label">Property Name</label>
                <input type="text" class="form-control" id="property_name" name="property_name" value="<?php echo $property['property_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Address</label>
                <input type="text" class="form-control" id="property_address" name="property_address" value="<?php echo $property['property_address']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Price</label>
                <input type="text" class="form-control" id="property_price" name="property_price" value="<?php echo $property['property_price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Type</label>
                <input type="text" class="form-control" id="property_type" name="property_type" value="<?php echo $property['property_type']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Size</label>
                <input type="text" class="form-control" id="property_size" name="property_size" value="<?php echo $property['property_size']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Property Status</label>
                <input type="text" class="form-control" id="property_status" name="property_status" value="<?php echo $property['property_status']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mb-5" name="update">Update</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>