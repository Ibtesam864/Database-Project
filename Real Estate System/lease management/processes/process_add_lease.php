<?php
include '../../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenant_id = $_POST['tenant_id'];
    $property_id = $_POST['property_id'];
    $lease_start = $_POST['lease_start'];
    $lease_end = $_POST['lease_end'];
    $rent_amount = $_POST['rent_amount'];

    $query = "INSERT INTO leases (tenant_id, property_id, lease_start, lease_end, rent_amount)
              VALUES ('$tenant_id', '$property_id', '$lease_start', '$lease_end', '$rent_amount')";

    if (mysqli_query($conn, $query)) {
        echo "Lease added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
