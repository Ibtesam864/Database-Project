<?php
include('../db_connection.php');

session_start();

if (isset($_SESSION['client_id'])) {
    $logged_in_user_id = $_SESSION['client_id'];
} elseif (isset($_SESSION['agent_id'])) {
    $logged_in_user_id = $_SESSION['agent_id'];
} elseif (isset($_SESSION['tenant_id'])) {
    $logged_in_user_id = $_SESSION['tenant_id'];
} else {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in to add a property."));
    exit();
}

$query = "SELECT p.*, i.image_path 
          FROM properties p 
          LEFT JOIN images i ON p.image_id = i.id";
$result = mysqli_query($conn, $query);

// Check for successful query execution
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch all results into an array
$properties = [];
while ($row = mysqli_fetch_assoc($result)) {
    $properties[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
    <style>
        .card img {
            object-fit: cover;
            height: 300px;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container my-5">
        <div class="row">
            <?php
            // Check if we have any properties in the array
            if (count($properties) > 0) {
                foreach ($properties as $row) {
                    $image_path = !empty($row['image_path']) ? 'uploads/' . $row['image_path'] : 'https://via.placeholder.com/300x300';
                    $property_user_id = $row['user_id']; // The user who posted the property
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="background-color: #EAF6FF;">
                            <img src="<?php echo $image_path; ?>" class="card-img-top" alt="Property Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['property_name']; ?></h5>
                                <p><strong>Price:</strong> Rs.<?php echo number_format($row['property_price']); ?></p>
                                <p><strong>Size:</strong> <?php echo $row['property_size']; ?> sqft</p>
                                <p><strong>Status:</strong> <?php echo $row['property_status']; ?></p>
                                <p><strong>Property Id:</strong> <?php echo $row['id'] ?> </p>
                                <p class="card-text">A beautiful property with modern amenities.</p>
                                <a href="edit_property.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Rent</a>
                                <a href="edit_property.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Buy</a>
                                <?php if ($logged_in_user_id == $property_user_id): ?>
                                    <a href="edit_property.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete_property.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this property?')">Delete</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No properties found.</p>";
            }
            ?>
        </div>
    </div>
    <?php include '../footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>