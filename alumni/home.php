<?php include "components/header.php"; ?>

<div class="container mx-auto p-4">
    <h2 class="text-3xl font-semibold mb-8 text-center">Choose Your Campus</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        
    <?php 
            $fetch_campus = $db->fetch_campus();
            foreach ($fetch_campus as $campus): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all">
            <img class="w-full h-48 object-cover" src="campus1.jpg" alt="Campus 1">
            <div class="p-6">
                <h3 class="text-2xl font-semibold text-gray-800"><?=$campus['campus_name']?></h3>
                <p class="text-gray-600 mt-2">Located in the heart of the city with excellent facilities.</p>
                <a href="#<?=$campus['campus_id']?>" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Select</a>
            </div>
        </div>

            <?php
                endforeach;
              ?>
        <!-- Card 1 -->
       



        
    </div>
</div>

<?php include "components/footer.php"; ?>
