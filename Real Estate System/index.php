<?php
session_start();
include 'db_connection.php';

$property_query = "
    SELECT p.*, i.image_path 
    FROM properties p 
    LEFT JOIN images i ON p.image_id = i.id
    WHERE p.featured = 'yes'";
$property_result = mysqli_query($conn, $property_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - REMS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h1 class="text-center" style="color: #013220;">Welcome to Real Estate System</h1>
        <h2 class="text-center" style="color: #D4AF37;">Your Trusted Partner in Property Management</h2>
        <p class="text-center" style="color: #000000;">At <strong>Real Estate System</strong>, we understand that finding the perfect property can be a daunting task. That’s why we are dedicated to simplifying the process for you, whether you're looking to buy, sell, or rent.</p>

        <hr>

        <h3 class="my-4" style="color: #013220;">Featured Properties</h3>
        <div class="row">
            <?php while ($property = mysqli_fetch_assoc($property_result)) { ?>
                <div class="col-md-4">
                    <div class="card featured mb-5">
                        <img class="card-img-top" src="https://localhost/Real%20Estate%20System/uploads/6746ed046248d5.41273016.jpg" alt="Property Image">
                        <div class="card-body featured-body">
                            <h5 class="card-title" style="color: #D4AF37;"><?php echo htmlspecialchars($property['property_name']); ?></h5>
                            <p class="card-text" style="color: #013220;"><strong>Price: </strong>Rs.<?php echo htmlspecialchars($property['property_price']); ?></p>
                            <p class="card-text" style="color: #013220;"><strong>Size: </strong><?php echo htmlspecialchars($property['property_size']); ?> sqft</p>
                            <p class="card-text" style="color: #013220;"><strong>Status: </strong><?php echo htmlspecialchars($property['property_status']); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>