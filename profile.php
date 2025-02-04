<?php
session_start();
include 'includes/db.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT profile_photo, first_name, last_name, email, phone FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIXINGYOU</title>
    <link rel="stylesheet" href="assets/styles.css"> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="aslin text-white">

    <?php include 'components/navbar.php'; ?>

    <section class="flex items-center justify-center h-[75vh]">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md text-center">
            <h2 class="text-2xl font-bold mb-6">Profile</h2>
            <img src="includes/<?= htmlspecialchars($user['profile_photo']); ?>" alt="Profile Photo" class="w-24 h-24 rounded-full mx-auto mb-4 border-2 border-gray-700">
            <p><strong>Name:</strong> <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']); ?></p>

            <button onclick="openModal()" class="mt-4 mx-auto block bg-red-700 text-white py-2 px-4 rounded-md hover:bg-red-800">Edit Profile</button>
        </div>
    </section>

    <!-- Modal -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
            <form id="editProfileForm" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?= $user_id; ?>">

                <div class="mb-3">
                    <label class="block text-sm">First Name</label>
                    <input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']); ?>" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md">
                </div>

                <div class="mb-3">
                    <label class="block text-sm">Last Name</label>
                    <input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']); ?>" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md">
                </div>

                <div class="mb-3">
                    <label class="block text-sm">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md">
                </div>

                <div class="mb-3">
                    <label class="block text-sm">Phone</label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']); ?>" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md">
                </div>

                <div class="mb-3">
                    <label class="block text-sm">Profile Photo</label>
                    <input type="file" name="profile_photo" class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md">
                </div>

                <button type="submit" class="w-full bg-red-700 text-white py-2 rounded-md hover:bg-red-800">Save Changes</button>
                <button type="button" onclick="closeModal()" class="w-full mt-2 bg-gray-700 text-white py-2 rounded-md hover:bg-gray-800">Cancel</button>
            </form>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <script>
        function openModal() {
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        $(document).ready(function() {
            $("#editProfileForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "includes/update_profile.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
