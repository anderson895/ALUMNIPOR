<?php 

$fetch_campus = $db->fetch_campus();



if (mysqli_num_rows($fetch_campus) > 0): 
    $count=1;
        foreach ($fetch_campus as $campus): ?>

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><?=$count?></td>
                        <td class="px-6 py-4"><?=$campus['campus_name']?></td>
                        <td class="px-6 py-4"><?=$campus['campus_description']?></td>
                        <td class="px-6 py-4">
                            <img src="../uploads/<?=$campus['campus_image']?>" alt="" class="w-24 h-24 object-cover">
                        </td>

                      
                        <td class="px-6 py-4 text-center">
                            <button class="Show_update_campus_modal bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition"
                            data-campus_id ='<?=$campus['campus_id']?>'
                            data-campus_name='<?=$campus['campus_name']?>'
                            data-campus_description='<?=$campus['campus_description']?>'
                            >Edit</button>
                            <button class="Show_delete_campus_modal bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition ml-2"
                            data-campus_id ='<?=$campus['campus_id']?>'
                            data-campus_name='<?=$campus['campus_name']?>'
                            >Delete</button>
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