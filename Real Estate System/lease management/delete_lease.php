<?php
include '../db_connection.php';

$lease_id = $_GET['id'];
$query = "DELETE FROM leases WHERE lease_id = $lease_id";

if (mysqli_query($conn, $query)) {
    echo "Lease deleted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
