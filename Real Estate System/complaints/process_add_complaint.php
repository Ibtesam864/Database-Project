<?php
session_start();
include '../db_connection.php';

if (isset($_POST['save'])) {
    $description = $_POST['description'];
    $request_date = $_POST['request_date'];
    $tenant_id = $_POST['tenant_id'];

    $insert_query = "
        INSERT INTO maintenance_requests (description, request_date, tenant_id) 
        VALUES ('$description', '$request_date', '$tenant_id')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        header("Location: https://localhost/Real%20Estate%20System/complaints/add_complaint.php");
        exit();
    } else {
        header("Location: https://localhost/Real%20Estate%20System/complaints/add_complaint.php");
        exit();
    }
}
