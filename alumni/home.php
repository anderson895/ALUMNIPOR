<?php include "components/header.php"; ?>

<div class="container mx-auto p-4">
    <h2 class="text-3xl font-semibold mb-8 text-center">Choose Your Campus</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        
    <?php 
        $fetch_campus = $db->fetch_campus();
        foreach ($fetch_campus as $campus): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all">
                <img class="w-full h-48 object-cover" src="../uploads/<?=$campus['campus_image']?>" alt="Campus 1">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800"><?=$campus['campus_name']?></h3>
                    <p class="text-gray-600 mt-2"><?=$campus['campus_description']?></p>
                    <!-- Button for selecting campus -->
                    <a href="javascript:void(0);" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 select-campus" data-campus-name="<?=$campus['campus_name']?>" data-campus-id="<?=$campus['campus_id']?>">Select</a>
                </div>
            </div>
    <?php endforeach; ?>
    </div>

    <!-- Alumni Table (hidden initially) -->
    <div id="alumni-table" class="hidden mt-8 p-4 bg-white rounded-lg shadow-lg">
        <h3 class="text-2xl font-semibold mb-4">Alumni List on <span id="campus-name"></span></h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Course</th>
                    <th class="py-2 px-4 border-b">Year Graduated</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody id="alumni-list">
                <!-- Alumni data will be dynamically inserted here -->
            </tbody>
        </table>
    </div>
</div>

<?php include "components/footer.php"; ?>
