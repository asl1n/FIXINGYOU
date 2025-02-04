<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIXINGYOU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body class="aslin text-white">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    
    <!-- Hero Section -->
    <section class="pt-10 md:pt-20">
        <div class="container mx-auto flex flex-col md:flex-row justify-between lg:w-[80%] px-3 lg:px-6">
            <!-- Left Section -->
            <div class="md:w-1/2 lg:w-2/5 text-white text-center md:text-left space-y-6 md:mt-14">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    GET HEALTHY BODY WITH THE PERFECT EXERCISES
                </h1>
                <p class="text-md leading-relaxed">
                    We are always here to help you make a healthy body and mind through the power of fitness.
                </p>
                <div class="flex items-center justify-center md:justify-start space-x-4 mt-6">
                    <button class="bg-red-600 px-6 py-3 rounded-md shadow-lg font-semibold text-sm">
                        Get Started
                    </button>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="md:w-1/2 lg:w-3/5 flex justify-center items-end mt-10 md:mt-0">
                <img src="assets/heroImage.png" alt="Hero Image" class="w-full h-auto max-w-lg md:max-w-xl object-cover">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>
</html>