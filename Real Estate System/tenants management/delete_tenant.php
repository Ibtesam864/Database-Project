<?php
include 'db_connection.php';

$tenant_id = $_GET['id'];
$query = "DELETE FROM tenants WHERE id = $tenant_id";

if (mysqli_query($conn, $query)) {
    header("Location: list_tenent.php?status=deleted");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
