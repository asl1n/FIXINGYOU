<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="aslin text-white">
    <?php
    session_start();
    include 'includes/db.php';
    include 'includes/signup_process.php';
    $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
    $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";
    unset($_SESSION['error_message'], $_SESSION['success_message']);
    ?>

    <?php include 'components/navbar.php'; ?>

    <section class="flex items-center justify-center h-screen">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>

            <?php if ($error_message): ?>
                <div class="bg-red-500 text-white p-2 rounded mb-4 text-center">
                    <?= $error_message; ?>
                </div>
            <?php elseif ($success_message): ?>
                <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                    <?= $success_message; ?>
                </div>
            <?php endif; ?>

            <form action="includes/signup_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" required>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" pattern="[0-9]{10}" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md focus:ring-2 focus:ring-red-700" required>
                </div>
                <div class="mb-4">
                    <label for="profile_photo" class="block text-sm font-medium">Profile Photo</label>
                    <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="w-full bg-gray-800 border border-gray-700 rounded-md p-2" required>
                </div>
                <button type="submit" name="submit" class="w-full bg-red-700 text-white py-2 rounded-md hover:bg-red-800">Sign Up</button>
            </form>

            <p class="mt-4 text-center">
                Already have an account? <a href="login.php" class="text-red-700 hover:underline">Login</a>
            </p>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>
</body>
</html>
