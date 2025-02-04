<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIXINGYOU</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="aslin text-white">

<?php
session_start();
include 'includes/db.php';

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, first_name, last_name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        $error_message = "Email not found!";
    } elseif (!password_verify($password, $user['password'])) {
        $error_message = "Incorrect password!";
    } else {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['first_name'];
        header("Location: profile.php");
        exit();
    }
}
?>

<?php include 'components/navbar.php'; ?>

<section class="flex items-center justify-center h-[75vh]">
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <?php if ($error_message): ?>
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                <?= $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" required>
            </div>
            <button type="submit" class="w-full bg-red-700 text-white py-2 rounded-md hover:bg-red-800">Login</button>
        </form>

        <p class="mt-4 text-center">
            Don't have an account? <a href="signup.php" class="text-red-700 hover:underline">Sign Up</a>
        </p>
    </div>
</section>

<?php include 'components/footer.php'; ?>

</body>
</html>
