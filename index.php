<?php include "components/header.php";?>


<body class="bg-gray-900 flex items-center justify-center min-h-screen">
<?php include "function/PageSpinner.php";?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Admin Card -->
    <div class="flex justify-center">
        <div class="bg-white shadow-lg rounded-lg p-6 text-center w-72">
            <div class="mb-4">
                <i class="fas fa-user-shield text-blue-500 text-6xl"></i>
            </div>
            <h5 class="text-xl font-semibold mb-4">ADMINISTRATOR</h5>
            <a href="admin/login.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Login As Admin</a>
        </div>
    </div>
    <!-- Alumni Card -->
    <div class="flex justify-center">
        <div class="bg-white shadow-lg rounded-lg p-6 text-center w-72">
            <div class="mb-4">
                <i class="fas fa-user-graduate text-green-500 text-6xl"></i> <!-- Alumni Icon -->
            </div>
            <h5 class="text-xl font-semibold mb-4">ALUMNI</h5>
            <a href="alumni/login.php" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Login As Alumni</a>
        </div>
    </div>
</div>
</body>
</html>
