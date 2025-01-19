<?php
session_start();
include '../db_connection.php';

if (isset($_POST['submit'])) {
    $client_id = $_POST['client_id'];
    $agent_id = $_POST['agent_id'];

    $agent_query = "UPDATE agents SET client_id = '$client_id' WHERE agent_id = '$agent_id'";
    $result = mysqli_query($conn, $agent_query);

    $client_query = "UPDATE clients SET agent_id = '$agent_id' WHERE client_id = '$client_id'";
    $result = mysqli_query($conn, $client_query);

    if ($result) {
        header("Location: https://localhost/Real%20Estate%20System/agents/agents_list.php");
        exit();
    } else {
        header("Location: https://localhost/Real%20Estate%20System/agents/agents_list.php");
        exit();
    }
}
