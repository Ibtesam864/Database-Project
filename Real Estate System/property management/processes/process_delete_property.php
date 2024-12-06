<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $property_id = intval($_GET['id']);

    $query = "DELETE FROM properties WHERE id = ?";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("i", $property_id);

    if ($stmt->execute()) {
        header("Location: list_property.php?message=Property deleted successfully");
        exit();
    } else {
        header("Location: list_property.php?error=Error deleting property");
        exit();
    }

    $stmt->close();
} else {
    header("Location: list_property.php?error=No property ID provided");
    exit();
}

$conn->close();
