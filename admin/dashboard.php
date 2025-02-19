<?php include "components/header.php"; ?>

<!-- Top bar with user profile -->
<div class="flex justify-between items-center bg-white p-4 mb-6 rounded-md shadow-md">
    <h2 class="text-lg font-semibold text-gray-700">Dashboard</h2>
    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-lg font-bold text-white">
        <?php
        echo substr(ucfirst($result[0]['admin_username']), 0, 1);
        ?>
    </div>
</div>

<!-- Dashboard Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
    <!-- Card for Total Campus -->
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img src="assets/school.png" alt="students icon" class="mb-4 w-12 max-w-full" />
        <h3 class="text-gray-700 font-semibold text-lg">Total Campus</h3>
        <p class="text-blue-500 text-2xl font-bold total_campus">0</p>
    </div>

    <!-- Card for Total Alumni -->
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img src="assets/campus.png" alt="students icon" class="mb-4 w-12 max-w-full" />
        <h3 class="text-gray-700 font-semibold text-lg">Total Alumni</h3>
        <p class="text-blue-500 text-2xl font-bold total_alumni">0</p>
    </div>
</div>

<!-- Statistics Chart -->
<div class="bg-white p-6 rounded-lg shadow-lg mt-6">
    <h3 class="text-gray-700 font-semibold text-lg mb-4">Statistics</h3>
    <div id="chart"></div>
</div>

<?php include "components/footer.php"; ?>

<!-- Load Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/dashboard.js"></script>
