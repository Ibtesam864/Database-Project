<?php
session_start();
include('../../db_connection.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'agent') {
        $query = "SELECT * FROM agents WHERE agent_name='$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['agent_id'] = $user['agent_id'];
            $_SESSION['username'] = $user['agent_name'];

            header("Location: ../../index.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else if ($role == 'client') {
        $query = "SELECT * FROM clients WHERE name='$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['client_id'] = $user['client_id'];
            $_SESSION['username'] = $user['name'];

            header("Location: ../../index.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else if ($role == 'tenant') {
        $query = "SELECT * FROM tenants WHERE tenant_name='$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['tenant_id'] = $user['tenant_id'];
            $_SESSION['username'] = $user['tenant_name'];

            header("Location: ../../index.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    }
}
