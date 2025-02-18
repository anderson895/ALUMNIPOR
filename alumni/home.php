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



<!-- Modal -->
<div id="alumniModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center" style="display:none;">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Alumni Details</h2>
            <button id="closeModal" class="text-red-500 hover:text-red-700">&times;</button>
        </div>
        <div class="mt-4 text-center">
            <img id="modalProfileImg" src="../uploads/default.jpg" alt="Profile Image" class="w-32 h-32 rounded-full mx-auto border">
            <h3 id="modalName" class="text-lg font-bold mt-2"></h3>
        </div>
        <div class="mt-4 space-y-2">
            <p><strong>Course:</strong> <span id="modalCourse"></span></p>
            <p><strong>Year Graduated:</strong> <span id="modalYear"></span></p>
            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
            <p><strong>Campus:</strong> <span id="modalCampus"></span></p>
            <p><strong>Year Enrolled:</strong> <span id="modalYearEnrolled"></span></p>
            <p><strong>Student No:</strong> <span id="modalStudentNo"></span></p>
            <p><strong>Previous Work:</strong> <span id="modalPreviousWork"></span></p>
            <p><strong>Current Work:</strong> <span id="modalCurrentWork"></span></p>
            <p><strong>Birthday:</strong> <span id="modalBday"></span></p>
        </div>
        <div class="mt-6 text-center">
            <button id="closeAlumniModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 w-full">Close</button>
        </div>
    </div>
</div>


<?php include "components/footer.php"; ?>
