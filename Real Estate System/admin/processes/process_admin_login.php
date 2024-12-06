<?php
session_start();
include('../../db_connection.php');

if (isset($_POST['login'])) {
    $admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
    $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);


    if ($admin_username == "admin_fasih" && $admin_password == "admin3257") {
        header("Location: ../admin_panel.php");
        exit();
    } else {
        echo "You are not an admin.";
        header("location: https://localhost/Real%20Estate%20System/index.php");
    }
}
