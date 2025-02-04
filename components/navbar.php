<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="text-white">
    <div class="lg:w-[80%] mx-auto flex items-center justify-between px-6 py-7">
        <!-- Logo -->
        <a href="index.php">
            <?php include 'components/logo.php'; ?>
        </a>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden text-white text-2xl focus:outline-none">
            <i id="menu-icon" class="fa fa-bars"></i>
        </button>

        <!-- Nav Links & User Info -->
        <div class="hidden md:flex items-center space-x-6">
            <ul class="flex space-x-6">
                <li><a href="index.php" class="hover:text-red-700">Home</a></li>
                <li><a href="profile.php" class="hover:text-red-700">Profile</a></li>
                <li><a href="contact.php" class="hover:text-red-700">Contact</a></li>
            </ul>

            <!-- Login / Logout Button -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="includes/logout.php" class="bg-red-700 px-3 py-2 rounded text-white">Log Out</a>
            <?php else: ?>
                <a href="login.php" class="bg-red-700 px-3 py-2 rounded text-white">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900 text-white space-y-4 p-4 transition-transform transform scale-95">
        <a href="index.php" class="block hover:text-red-700">Home</a>
        <a href="profile.php" class="block hover:text-red-700">Profile</a>
        <a href="contact.php" class="block hover:text-red-700">Contact</a>

        <!-- Mobile Login / Logout Button -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="includes/logout.php" class="block bg-red-700 px-3 py-2 rounded text-white">Log Out</a>
        <?php else: ?>
            <a href="login.php" class="block bg-red-700 px-3 py-2 rounded text-white">Login</a>
        <?php endif; ?>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuIcon = document.getElementById("menu-icon");

    menuToggle.addEventListener("click", function () {
        mobileMenu.classList.toggle("hidden");
        menuIcon.classList.toggle("fa-bars");
        menuIcon.classList.toggle("fa-times");
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (event) {
        if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add("hidden");
            menuIcon.classList.add("fa-bars");
            menuIcon.classList.remove("fa-times");
        }
    });
</script>