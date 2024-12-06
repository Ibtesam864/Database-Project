<?php
include '../../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenant_name = $_POST['tenant_name'];
    $tenant_contact = $_POST['tenant_contact'];
    $tenant_email = $_POST['tenant_email'];
    $property_id = $_POST['property_id'];
    $lease_start = $_POST['lease_start'];
    $lease_end = $_POST['lease_end'];
    $rent_amount = $_POST['rent_amount'];

    $query = "INSERT INTO tenants (tenant_name, tenant_contact, tenant_email, property_id, lease_start, lease_end, rent_amount)
              VALUES ('$tenant_name', '$tenant_contact', '$tenant_email', '$property_id', '$lease_start', '$lease_end', '$rent_amount')";

    if (mysqli_query($conn, $query)) {
        header("Location: https://localhost/Real%20Estate%20System/tenants%20management/list_tenant.php ?status=success");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
