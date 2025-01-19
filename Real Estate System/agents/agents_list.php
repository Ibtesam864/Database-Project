<?php
session_start();
include '../db_connection.php';

if (isset($_SESSION['client_id'])) {
    $logged_in_user_id = $_SESSION['client_id'];
} else {
    header("Location: https://localhost/Real%20Estate%20System/user/login.php?message=" . urlencode("You must be logged in."));
    exit();
}

$query = "SELECT * FROM agents";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$agents = [];
while ($agent = mysqli_fetch_assoc($result)) {
    $agents[] = $agent;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agents List - REMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body>
    <?php include '../navbar.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4">Agents List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any agents
                if (count($agents) > 0) {
                    foreach ($agents as $agent) {
                        echo "<tr> 
                            <td>{$agent['agent_id']}</td>
                            <td>{$agent['agent_name']}</td>
                            <td>{$agent['agent_phone']}</td>
                            <td>{$agent['agent_email']}</td>
                            <td>{$agent['agent_address']}</td>
                            <td>{$agent['agent_role']}</td>
                            <td>
                            <form action='process_agent.php' method='post'>
                                <input type='hidden' name='client_id' value='{$_SESSION['client_id']}'>
                                <input type='hidden' name='agent_id' value='{$agent['agent_id']}'>
                                <button class='btn btn-primary' type='submit' name='submit' >Select</button>
                            </form>
                            </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No tenants found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>