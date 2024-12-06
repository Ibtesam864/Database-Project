<?php
session_start();
include('../../db_connection.php');

// Check if the form is submitted
if (isset($_POST['save'])) {
    $property_name = $_POST['property_name'];
    $property_address = $_POST['property_address'];
    $property_price = $_POST['property_price'];
    $property_size = $_POST['property_size'];
    $property_type = $_POST['property_type'];
    $property_status = $_POST['property_status'];
    $featured = $_POST['featured'];

    if (!isset($_SESSION['user_id'])) {
        die("Error: User not logged in!");
    }

    $user_id = $_SESSION['user_id'];

    // Check if an image is uploaded
    if (isset($_FILES['property_image']) && $_FILES['property_image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['property_image']['name'];
        $imageTmpName = $_FILES['property_image']['tmp_name'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowed)) {
            $newImageName = uniqid('', true) . "." . $imageExt;
            $uploadDir = "../../uploads/";
            $uploadPath = $uploadDir . $newImageName;

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            move_uploaded_file($imageTmpName, $uploadPath);
            $uploadedAt = date("Y-m-d H:i:s");

            // Insert into images table
            $sql = "INSERT INTO images (image_name, image_path, uploaded_at) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $newImageName, $uploadPath, $uploadedAt);
            $stmt->execute();

            $image_id = $conn->insert_id;

            // Insert into properties table
            $query = "INSERT INTO properties (property_name, property_address, property_price, property_size, property_type, property_status, user_id, image_id, featured) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = $conn->prepare($query);
            $stmt2->bind_param("ssisssiii", $property_name, $property_address, $property_price, $property_size, $property_type, $property_status, $user_id, $image_id, $featured);

            if ($stmt2->execute()) {
                header("Location: ../list_properties.php");
                exit();
            } else {
                echo "Error inserting property: " . $stmt2->error;
            }
        } else {
            echo "Invalid file type!";
        }
    } else {
        echo "No file uploaded or an error occurred!";
    }
}
