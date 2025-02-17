<?php 

$fetch_campus = $db->fetch_campus();



if (mysqli_num_rows($fetch_campus) > 0): 
    $count=1;
        foreach ($fetch_campus as $campus): ?>

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><?=$count?></td>
                        <td class="px-6 py-4"><?=$campus['campus_name']?></td>
                        <td class="px-6 py-4"><?=$campus['campus_description']?></td>
                      
                        <td class="px-6 py-4 text-center">
                            <button class="bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition ml-2">Delete</button>
                        </td>
                    </tr>
    <?php
     $count++; 
    endforeach;
   ?>
   
<?php else: ?>
    <tr>
        <td colspan="5" class="p-2">No record found.</td>
    </tr>
<?php endif; ?>