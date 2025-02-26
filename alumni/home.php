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
                    <p class="text-gray-600 mt-2 campus-description">
                        <?=$campus['campus_description']?>
                    </p>
                    <!-- Button for selecting campus -->
                    <a href="javascript:void(0);" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 select-campus" data-campus-name="<?=$campus['campus_name']?>" data-campus-id="<?=$campus['campus_id']?>">Select</a>
                </div>
            </div>
    <?php endforeach; ?>
    </div>

 <!-- Alumni Table (hidden initially) -->
        <div id="alumni-table" class="hidden mt-8 p-4 bg-white rounded-lg shadow-lg">
            <h3 class="text-2xl font-semibold mb-4">Alumni List on <span id="campus-name"></span></h3>

            <!-- Responsive Table Wrapper -->
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border border-gray-300">Name</th>
                            <th class="py-2 px-4 border border-gray-300">Course</th>
                            <th class="py-2 px-4 border border-gray-300">Year Graduated</th>
                            <th class="py-2 px-4 border border-gray-300">Email</th>
                            <th class="py-2 px-4 border border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody id="alumni-list">
                        <!-- Alumni data will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </div>

</div>

<!-- Modal -->
<div id="alumniModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center p-4 transition-opacity duration-300" style="display:none;">
    <div class="bg-white p-6 rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center border-b pb-3">
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 flex items-center">
                <span class="material-icons text-blue-500 mr-2">school</span> Alumni Details
            </h2>
            <button class="closeAlumniModal text-gray-500 hover:text-red-600 text-2xl sm:text-3xl font-bold">
                <span class="material-icons">close</span>
            </button>
        </div>

        <!-- Profile Section -->
        <div class="mt-5 text-center">
            <img id="modalProfileImg" src="../uploads/default.jpg" alt="Profile Image" class="w-28 sm:w-36 h-28 sm:h-36 rounded-full mx-auto border-4 border-gray-300 shadow-lg">
            <h3 id="modalName" class="text-lg sm:text-xl font-bold mt-3 text-gray-900"></h3>
        </div>

        <!-- Alumni Information -->
        <div class="mt-5 space-y-4 text-gray-700">
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">cake</span>
                <p><strong class="text-gray-900">Birthday:</strong> <span id="modalBday"></span></p>
            </div>
            
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">book</span>
                <p><strong class="text-gray-900">Course:</strong> <span id="modalCourse"></span></p>
            </div>
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">calendar_today</span>
                <p><strong class="text-gray-900">Year Graduated:</strong> <span id="modalYear"></span></p>
            </div>
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">email</span>
                <p><strong class="text-gray-900">Email:</strong> <span id="modalEmail"></span></p>
            </div>
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">location_on</span>
                <p><strong class="text-gray-900">Campus:</strong> <span id="modalCampus"></span></p>
            </div>
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">history_edu</span>
                <p><strong class="text-gray-900">Year Enrolled:</strong> <span id="modalYearEnrolled"></span></p>
            </div>
            <div class="flex items-center">
                <span class="material-icons text-gray-600 mr-2">badge</span>
                <p><strong class="text-gray-900">Student No:</strong> <span id="modalStudentNo"></span></p>
            </div>

            <!-- Work Experience Section -->
            <div class="border-t pt-4">
                <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                    <span class="material-icons text-gray-500 mr-2">work</span> Work Experience
                </h4>
                <div class="p-3 bg-gray-100 rounded-md shadow-sm">
                    <p><strong class="text-gray-900">Current Work:</strong></p>
                    <div id="modalCurrentWork" class="text-sm"></div>
                </div>

                <p class="mt-4"><strong class="text-gray-900">Previous Work:</strong></p>
                <div id="modalPreviousWork" class="bg-gray-100 p-3 rounded-md shadow-sm text-sm space-y-4 max-h-48 overflow-y-auto"></div>
            </div>
        </div>
    </div>
</div>





<?php include "components/footer.php"; ?>
<script src="js/fetch_campus.js"></script>
<script src="../function/js/see_more.js"></script>