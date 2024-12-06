<?php
session_start();

include('../../db_connection.php');

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Username already exists
        echo "Username already taken. Please choose another.";
    } else {
        // Proceed with insertion
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            header("Location: ../../index.php"); // Redirect on successful registration
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
