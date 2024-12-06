<?php
// Start session and include database connection
session_start();
include('db_connection.php');

// Check if a search term is provided
if (isset($_GET['query'])) {
    $search_query = trim(mysqli_real_escape_string($conn, $_GET['query'])); // Sanitize user input

    // Query the database for matching properties (example: searching the "properties" table)
    $sql = "SELECT * FROM properties 
            WHERE property_name LIKE '%$search_query%' 
               OR property_status LIKE '%$search_query%'
               OR property_price LIKE '%$search_query%'
               OR property_size LIKE '%$search_query%'";

    $result = mysqli_query($conn, $sql);
} else {
    // If no search term, redirect back or show a default message
    header("Location: https://localhost/Real%20Estate%20System/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container my-5">
        <h2>Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h2>
        <div class="row">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo !empty($row['image_path']) ? 'uploads/' . $row['image_path'] : 'https://via.placeholder.com/300x300'; ?>" class="card-img-top" alt="Property Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['property_name']; ?></h5>
                                <p><strong>Price:</strong> $<?php echo number_format($row['property_price']); ?></p>
                                <p><strong>Size:</strong> <?php echo $row['property_size']; ?> sqft</p>
                                <p><strong>Status:</strong> <?php echo $row['property_status']; ?></p>
                                <a href="property_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-muted">No results found for "<?php echo htmlspecialchars($search_query); ?>".</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>