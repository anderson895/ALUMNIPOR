<?php
session_start();
include('backend/class.php');

$db = new global_class();

if (isset($_SESSION['alumni_id'])) {
    $alumni_id = intval($_SESSION['alumni_id']);

    // Gamitin ang check_account method
    $user = $db->check_account($alumni_id);

    print_r($user);
    if (!empty($user)) {
      
    } else {
       header('location: login.php');
    }
} else {
   header('location: login.php');
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN</title>
  <link rel="icon" type="image/png" href="assets/logo1.png">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 

</head>
<body class="bg-gray-100 font-sans antialiased">



<?php include "../function/PageSpinner.php"; ?>

<!-- Top Bar Header -->
<header class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <!-- Logo Section -->
        <div class="flex items-center space-x-4">
            <img src="../uploads/<?=$user[0]['profile_picture']?>" alt="Website Logo" class="w-12 h-12 object-contain">
            <h1 class="text-2xl font-semibold"><?=$user[0]['fname']?> <?=$user[0]['mname']?> <?=$user[0]['lname']?></h1>
        </div>

        <!-- Mobile Hamburger Menu Button -->
        <div class="lg:hidden">
            <button id="hamburger" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation Links -->
        <nav class="hidden lg:block">
            <ul class="flex space-x-6">
                <li><a href="home.php" class="hover:text-gray-400 transition duration-300">Home</a></li>
                <li><a href="campus.php" class="hover:text-gray-400 transition duration-300">Campus</a></li>
                <li><a href="settings" class="hover:text-gray-400 transition duration-300">Settings</a></li>
            </ul>
        </nav>

        <!-- Call-to-Action Button -->
        <a href="logout.php"
           class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 transition duration-300 hidden lg:inline-block">
            Logout
        </a>
    </div>
</header>

<!-- Sidebar (Initially hidden and off-screen to the left) -->
<div id="sidebar" class="lg:hidden fixed inset-0  z-40 hidden transform -translate-x-full transition-transform duration-300 ease-in-out">
    <div class="w-64 bg-gray-800 text-white h-full p-4">
        <div class="flex justify-between items-center">
            <img src="logo.png" alt="Website Logo" class="w-12 h-12 object-contain">
            <button id="close-sidebar" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <ul class="mt-8 space-y-6">
            <li><a href="home.php" class="block hover:text-gray-400 transition duration-300">Home</a></li>
            <li><a href="campus" class="block hover:text-gray-400 transition duration-300">Campus</a></li>
            <li><a href="settings.php" class="block hover:text-gray-400 transition duration-300">Settings</a></li>
            <li><a href="logout.php" class="block hover:text-gray-400 transition duration-300">Logout</a></li>
        </ul>
    </div>
</div>

     