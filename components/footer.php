<footer>
    <!-- Thin Border (80% width, centered) -->
    <div class="w-4/5 mx-auto border-t border-gray-500"></div>

    <!-- Footer Content -->
    <div class="w-4/5 mx-auto flex flex-col md:flex-row items-center justify-between gap-4 text-center py-4">
        
        <!-- Left Section: Logo -->
        <?php include 'components/logo.php'; ?>

        <!-- Center Section: Copyright -->
        <div class="font-thin text-xs lg:text-base leading-relaxed text-gray-400">
            &copy; <?php echo date('Y'); ?> Aslin Dai. All Copyrights reserved.
        </div>

        <!-- Right Section: Social Icons -->
        <div class="flex gap-3">
            <a href="#" class="text-white text-lg lg:text-xl"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white text-lg lg:text-xl"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white text-lg lg:text-xl"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white text-lg lg:text-xl"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

<!-- FontAwesome for Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>