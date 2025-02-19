<?php 

$fetch_alumni = $db->fetch_alumni();



if (mysqli_num_rows($fetch_alumni) > 0): 
    $count=1;
        foreach ($fetch_alumni as $alumni): ?>

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><?=$count?></td>
                        <td class="px-6 py-4"><?=ucfirst($alumni['fname'])?> <?=$alumni['mname']?> <?=$alumni['lname']?></td>
                        <td class="px-6 py-4"><?=$alumni['course']?></td>
                        <td class="px-6 py-4"><?=$alumni['year_graduated']?></td>
                        <td class="px-6 py-4"><?=$alumni['email']?></td>
                        <td class="px-6 py-4">
                            <img src="../uploads/<?=$alumni['profile_picture']?>" alt="" class="w-24 h-24 object-cover">
                        </td>

                      
                        <td class="px-6 py-4 text-center">
                            <button class="Show_update_alumni_modal bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition"
                            data-fname='<?=$alumni['fname']?>'
                            data-mname='<?=$alumni['mname']?>'
                            data-lname='<?=$alumni['lname']?>'
                            data-bday='<?=$alumni['bday']?>'
                            data-current_work='<?=$alumni['current_work']?>'
                            data-previous_work='<?=$alumni['previous_work']?>'
                            data-student_no='<?=$alumni['student_no']?>'
                            data-year_enrolled='<?=$alumni['year_enrolled']?>'
                            data-year_graduated='<?=$alumni['year_graduated']?>'
                            data-campus='<?=$alumni['campus']?>'
                            data-course='<?=$alumni['course']?>'
                            data-email='<?=$alumni['email']?>'
                            data-alumni_id ='<?=$alumni['alumni_id']?>'
                            >Edit</button>
                            <button class="Show_delete_alumni_modal bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition ml-2"
                            data-alumni_id ='<?=$alumni['alumni_id']?>'
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