<?php
include '../../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lease_id = $_POST['lease_id'];
    $tenant_id = $_POST['tenant_id'];
    $property_id = $_POST['property_id'];
    $lease_start = $_POST['lease_start'];
    $lease_end = $_POST['lease_end'];
    $rent_amount = $_POST['rent_amount'];

    $query = "UPDATE leases SET tenant_id = '$tenant_id', property_id = '$property_id',
              lease_start = '$lease_start', lease_end = '$lease_end', rent_amount = '$rent_amount'
              WHERE lease_id = $lease_id";

    if (mysqli_query($conn, $query)) {
        echo "Lease updated successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
