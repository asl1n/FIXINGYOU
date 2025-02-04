<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Get the current profile photo from the database
    $stmt = $conn->prepare("SELECT profile_photo FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $current_photo = $user['profile_photo'];

    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $profile_photo = $current_photo;

    if (!empty($_FILES["profile_photo"]["name"])) {
        $file_name = basename($_FILES["profile_photo"]["name"]);
        $target_file = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
            $profile_photo = $target_file;  
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    // Update the database
    $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, profile_photo = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone, $profile_photo, $user_id);

    if ($stmt->execute()) {
        $_SESSION['profile_photo'] = $profile_photo;
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile.";
    }

    $stmt->close();
    $conn->close();
}
?>