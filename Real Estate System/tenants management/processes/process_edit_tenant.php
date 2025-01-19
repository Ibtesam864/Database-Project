<?php
include '../../db_connection.php';

if (isset($_GET['tenant_id'])) {
    $tenant_id = $_GET['tenant_id'];

    // Fetch existing data
    $query = "SELECT * FROM tenants WHERE tenant_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $tenant_id); // "i" means integer type
    $stmt->execute();
    $result = $stmt->get_result();
    $tenant = $result->fetch_assoc();

    // Check if tenant exists
    if (!$tenant) {
        echo "Tenant not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lease_start = mysqli_real_escape_string($conn, $_POST['lease_start']);
    $lease_end = mysqli_real_escape_string($conn, $_POST['lease_end']);
    $rent_amount = mysqli_real_escape_string($conn, $_POST['rent_amount']);

    // Update query with prepared statements
    $query = "UPDATE tenants SET tenant_name=?, tenant_contact=?, tenant_email=?, lease_start=?, lease_end=?, rent_amount=? WHERE tenant_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $name, $contact, $email, $lease_start, $lease_end, $rent_amount, $tenant_id);

    if ($stmt->execute()) {
        header("Location: list_tenent.php?status=updated");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
