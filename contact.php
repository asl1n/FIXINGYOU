<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Aslin Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body class="aslin text-white">
<?php include 'components/navbar.php'; ?>

<div class="w-[80%] mx-auto my-12 h-[60vh]">
    <div class="border border-gray-400 rounded-lg p-6 w-full md:w-2/3 mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">Contact Us</h1>
        <div class="space-y-4 md:text-2xl">
            <!-- Email -->
            <div class="flex items-center justify-between border-b pb-2">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-envelope text-red-700"></i>
                    <span class="font-semibold">Email</span>
                </div>
                <span>aslin@support.com</span>
            </div>

            <!-- Phone -->
            <div class="flex items-center justify-between border-b pb-2">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-phone text-red-700"></i>
                    <span class="font-semibold">Phone</span>
                </div>
                <span>+977 9800000000</span>
            </div>

            <!-- Address -->
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-map-marker-alt text-red-700"></i>
                    <span class="font-semibold">Address</span>
                </div>
                <span>Lalitpur, Nepal</span>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>
</body>
</html>