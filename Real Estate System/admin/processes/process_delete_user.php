<?php
session_start();
include('../../db_connection.php');

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        header("Location: ../display_users.php?message=User deleted successfully");
        exit();
    } else {
        header("Location: ../display_users.php?error=Error deleting user");
        exit();
    }

    $stmt->close();
} else {
    header("Location: display_users.php?error=No user ID provided");
    exit();
}

$conn->close();
