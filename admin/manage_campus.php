<?php include "components/header.php";?>

<div class="container mx-auto p-6">
    <!-- Card Container -->  
     <!-- Header --> <h2 class="text-2xl font-semibold text-gray-800 mb-12 text-centergit">Manage Campus</h2>
    <div class="bg-white shadow-lg rounded-lg p-6">
      
        <div class="flex justify-between items-center mb-4">
           
            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition mb-3"> + Add Campus</button>

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
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Status</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Main Campus</td>
                        <td class="px-6 py-4">New York, USA</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-sm text-green-700 bg-green-100 rounded-full">Active</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition ml-2">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">City Campus</td>
                        <td class="px-6 py-4">Los Angeles, USA</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-sm text-red-700 bg-red-100 rounded-full">Inactive</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition ml-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript for Search Function -->
<script>
    function searchTable() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let table = document.getElementById("campusTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) { 
            let cols = rows[i].getElementsByTagName("td");
            let found = false;
            
            for (let j = 1; j < cols.length - 1; j++) { // Skip the first and last column
                if (cols[j].innerText.toLowerCase().includes(input)) {
                    found = true;
                    break;
                }
            }
            
            rows[i].style.display = found ? "" : "none";
        }
    }
</script>

<?php include "components/footer.php";?>
