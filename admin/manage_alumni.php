<?php include "components/header.php";?>

<div class="container mx-auto p-6">
    <!-- Card Container -->  
     <!-- Header --> <h2 class="text-2xl font-semibold text-gray-800 mb-12 text-centergit">Manage Alumni</h2>
    <div class="bg-white shadow-lg rounded-lg p-6">
      
        <div class="flex justify-between items-center mb-4">
           
            <!-- <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition mb-3" id="Show_campus_report_modal"> + Add Campus</button> -->

            <div class="flex space-x-4">
                <!-- Search Input -->
                <input type="text" id="searchInput" placeholder="Search Alumni..." 
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    onkeyup="searchTable()">

               
            </div>
        </div>
       
        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="campusTable" class="w-full border-collapse bg-white shadow-sm rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">#</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Student No.</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Name</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Course</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Year Graduated</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Campus</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Email</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Profile</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                   <?php include "backend/end-points/alumni_list.php";?>
                </tbody>
            </table>
        </div>
    </div>
</div>








<!-- Modal -->
<div id="delete_alumni_modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center p-4" style="display:none;">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-[90%] max-w-lg max-h-[90vh] overflow-y-auto relative">

        <!-- Close Button -->
        <button class="close_delete_alumni_modal absolute top-3 right-3 text-gray-700 p-2 rounded-full hover:bg-gray-200 focus:outline-none">
            &times;
        </button>

        <!-- Modal Content -->
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 text-center mb-4">Delete This Record?</h2>

        <!-- Spinner (Loading State) -->
        <div id="spinner" class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center hidden">
            <div class="w-10 h-10 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
        </div>

        <!-- Modal Form -->
        <form id="frmDeleteAlumni" class="space-y-4">

            <input type="hidden" id="alumni_id_delete" name="alumni_id" required>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3">
                <button type="button" class="close_delete_alumni_modal bg-gray-300 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" id="btnDeleteAlumni" class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Confirm
                </button>
            </div>
        </form>
    </div>
</div>









<!-- Modal -->
<div id="update_alumni_modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center" style="display:none;">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:max-w-3xl max-h-[90vh] overflow-y-auto flex flex-col justify-between relative">

        <!-- Close Button -->
        <button id="close_alumni_modal" class="absolute top-4 right-4 text-gray-700 p-2 rounded-full hover:bg-gray-600 focus:outline-none z-10">
            &times;
        </button>


        <!-- Modal Content -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Update Details</h2>

        <!-- Modal Form for Adding Campus -->
        <form id="frmUpdateAlumni" class="space-y-4">

            <div class="spinner" id="spinner" style="display:none;">
                <div class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
                <div class="w-10 h-10 border-4 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
                </div>
            </div>

            <div hidden>
                <label for="alumni_id" class="block text-sm font-medium text-gray-700">alumni_id</label>
                <input type="text" id="alumni_id" name="alumni_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
            </div>

                <!-- Profile picture -->
            <div class="col-span-2">
                <label for="profilePict" class="block text-sm font-medium text-gray-700">Upload Profile Picture</label>
                <input type="file" id="profilePict" name="profilePict" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" accept="image/*" >
            </div>



                    <!-- Name Fields (1 Row) -->
            <div class="col-span-2 grid grid-cols-3 gap-4">
                <div>
                <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first-name" name="first-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                </div>
                <div>
                <label for="middle-name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                <input type="text" id="middle-name" name="middle-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last-name" name="last-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                </div>
            </div>


            <!-- Birthday -->
            <div class="col-span-2">
                <label for="bday" class="block text-sm font-medium text-gray-700">Birthday</label>
                <input type="date" id="bday" name="bday" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
            </div>

            <!-- Current Work Section -->
            <div class="col-span-2 bg-white p-6 rounded-2xl shadow-lg border border-gray-300">
                <h6 class="text-lg font-semibold text-gray-800 text-center">Current Work</h6>
                <hr class="mt-2 mb-4 border-gray-300">

                <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="current_work_companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" id="current_work_companyName" name="current_work_companyName" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                </div>
                <div>
                    <label for="current_work_address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="current_work_address" name="current_work_address" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                </div>
                <div>
                    <label for="current_work_Position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="current_work_Position" name="current_work_Position" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                </div>
                <div>
                    <label for="current_work_Start" class="block text-sm font-medium text-gray-700">Start</label>
                    <input type="text" id="current_work_Start" name="current_work_Start" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                </div>
                </div>
            </div>

            <div class="col-span-2" id="previousWorkContainer"></div>
            <button type="button" id="addPreviousWork" class="col-span-2 px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Add Previous Work</button>

            <!-- Student & Education Info -->
            <div>
                <label for="studNo" class="block text-sm font-medium text-gray-700">Student No</label>
                <input type="text" id="studNo" name="studNo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
            </div>
            <div>
                <label for="enrolled_year" class="block text-sm font-medium text-gray-700">Year Enrolled</label>
                <select id="enrolled_year" name="enrolled_year" class="year mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                <option value="">Select Year</option>
                </select>
            </div>
            <div>
                <label for="graduated_year" class="block text-sm font-medium text-gray-700">Year Graduated</label>
                <select id="graduated_year" name="graduated_year" class="year mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                <option value="">Select Year</option>
                </select>
            </div>

            

            <div class="col-span-2">
                <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
                <select id="campus" name="campus" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
                <option value="">Select Campus</option>
                <?php 
                    $fetch_campus = $db->fetch_campus();
                    foreach ($fetch_campus as $campus): ?>
                    <option value="<?=$campus['campus_id']?>"> <?=$campus['campus_name']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>

            <div>
                <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                <input type="text" id="course" name="course" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
            </div>
            


            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" id="btnUpdateAlumni" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Save Campus
                </button>
            </div>
        </form>
    </div>
</div>



<!-- JavaScript for Search Function -->
<script src="js/searchTable.js"></script>
<script src="js/modal.js"></script>
<script src="js/update_alumni.js"></script>

<?php include "components/footer.php";?>
