<?php
session_start();
echo 'Session started.<br>';

include('../../db_connection.php');
echo 'Database connection included.<br>';

if (isset($_POST['signup'])) {
    echo 'Signup form submitted.<br>';

    if ($_POST['role'] == 'agent') {
        echo 'Agent registration started.<br>';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['agentEmail'];
        $address = $_POST['agentAddress'];
        $contact = $_POST['agentPhone'];
        $role = $_POST['agentRole'];

        echo 'SQL query built.<br>';

        $check_query = "SELECT * FROM agents WHERE agent_name = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        echo 'Executed check query.<br>';

        if ($result->num_rows > 0) {
            echo "Username already taken. Please choose another.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO agents (agent_name, password, agent_email, agent_phone, agent_address, agent_role)
                  VALUES ('$username', '$hashed_password', '$email', '$contact', '$address', '$role')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: https://localhost/Real%20Estate%20System/user/login.php?status=success");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    } else if ($_POST['role'] == 'client') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address = $_POST['clientAddress'];
        $contact = $_POST['clientPhone'];
        $role = $_POST['clientRole'];

        $check_query = "SELECT * FROM clients WHERE name = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username already taken. Please choose another.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO clients (name, password, contact, address, role)
                      VALUES ('$username', '$hashed_password', '$contact', '$address', '$role')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: https://localhost/Real%20Estate%20System/user/login.php?status=success");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    } else if ($_POST['role'] == 'tenant') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address = $_POST['clientAddress'];
        $contact = $_POST['clientPhone'];
        $role = $_POST['clientRole'];

        $check_query = "SELECT * FROM tenants WHERE tenant_name = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username already taken. Please choose another.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO tenants (tenant_name, password, tenant_contact, tenant_email, tenant_address)
            VALUES ('$username', '$hashed_password', '$contact', '$email', '$address')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: https://localhost/Real%20Estate%20System/user/login.php?status=success");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}
