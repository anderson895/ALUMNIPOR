<?php include "components/header.php";?>

<div class="container mx-auto p-6">
    <!-- Card Container -->  
     <!-- Header --> <h2 class="text-2xl font-semibold text-gray-800 mb-12 text-centergit">Manage Campus</h2>
    <div class="bg-white shadow-lg rounded-lg p-6">
      
        <div class="flex justify-between items-center mb-4">
           
            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition mb-3" id="Show_campus_report_modal"> + Add Campus</button>

            <div class="flex space-x-4">
                <!-- Search Input -->
                <input type="text" id="searchInput" placeholder="Search campus..." 
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
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Campus Name</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Location</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                   <?php include "backend/end-points/campus_list.php";?>
                </tbody>
            </table>
        </div>
    </div>
</div>















<!-- Modal -->
<div id="add_campus_modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center" style="display:none;">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:max-w-3xl max-h-[90vh] overflow-y-auto flex flex-col justify-between relative">

        <!-- Close Button -->
        <button id="close_campus_modal" class="absolute top-4 right-4 text-gray-700 p-2 rounded-full hover:bg-gray-600 focus:outline-none z-10">
            &times;
        </button>

        <!-- Spinner -->
        <div class="spinner" style="display:none;">
            <div class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
                <div class="w-10 h-10 border-4 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
            </div>
        </div>

        <!-- Modal Content -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Campus</h2>

        <!-- Modal Form for Adding Campus -->
        <form id="frmAddCampus" class="space-y-4">
            <!-- Campus Name -->
            <div>
                <label for="campus_name" class="block text-sm font-medium text-gray-700">Campus Name</label>
                <input type="text" name="campus_name" id="campus_name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter campus name">
            </div>

            <!-- Campus Description -->
            <div>
                <label for="campus_description" class="block text-sm font-medium text-gray-700">Campus Description</label>
                <input type="text" name="campus_description" id="campus_description" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter campus description">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" id="btnAddCampus" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Save Campus
                </button>
            </div>
        </form>
    </div>
</div>





<!-- JavaScript for Search Function -->
<script src="js/searchTable.js"></script>
<script src="js/modal.js"></script>

<?php include "components/footer.php";?>
