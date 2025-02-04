<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db.php';

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['password']) || empty($_FILES['profile_photo']['name'])) {
        $error_message = "All fields including the profile photo are required.";
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email is already in use.";
        } else {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $profile_photo = $upload_dir . basename($_FILES['profile_photo']['name']);

            if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profile_photo)) {
                $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone, password, profile_photo) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $password, $profile_photo);

                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Account created successfully!";
                    header("Location: ../signup.php");
                    exit();
                } else {
                    $error_message = "Signup failed! Try again.";
                }
            } else {
                $error_message = "Failed to upload profile photo.";
            }
        }
    }

    $_SESSION['error_message'] = $error_message;
    header("Location: ../signup.php");
    exit();
}
?>