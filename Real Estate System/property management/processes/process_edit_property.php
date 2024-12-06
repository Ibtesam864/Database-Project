<?php
include('../../db_connection.php');

if (isset($_POST['update'])) {
    $property_id = $_POST['property_id'];
    $property_name = $_POST['property_name'];
    $property_address = $_POST['property_address'];
    $property_price = $_POST['property_price'];
    $property_size = $_POST['property_size'];
    $property_type = $_POST['property_type'];
    $property_status = $_POST['property_status'];

    // Update query
    $query = "UPDATE properties SET property_name='$property_name', property_address='$property_address', 
              property_price='$property_price', property_size='$property_size', 
              property_type='$property_type', property_status='$property_status' WHERE id='$property_id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../list_properties.php");
        exit();
    } else {
        echo "Error updating record:" . mysqli_error($conn);
    }
}
