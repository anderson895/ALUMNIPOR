
 // Open Modal
 let workCount = 0; // Dapat nasa labas para hindi ma-reset

 $(".Show_update_alumni_modal").click(function() {
     $("#update_alumni_modal").fadeIn();
     $("#first-name").val($(this).data('fname'));
     $("#middle-name").val($(this).data('mname'));
     $("#last-name").val($(this).data('lname'));
     $("#bday").val($(this).data('bday'));
     $("#studNo").val($(this).data('student_no'));
     $("#enrolled_year").val($(this).data('year_enrolled'));
     $("#graduated_year").val($(this).data('year_graduated'));
     $("#campus").val($(this).data('campus'));
     $("#course").val($(this).data('course'));
     $("#email").val($(this).data('email'));
     $("#alumni_id").val($(this).data('alumni_id'));
 
     $("#current_work_companyName").val($(this).data('current_work')?.companyName || "");
     $("#current_work_address").val($(this).data('current_work')?.address || "");
     $("#current_work_Position").val($(this).data('current_work')?.position || "");
     $("#current_work_Start").val($(this).data('current_work')?.start || "");
 
     let previousWorkData = $(this).data('previous_work');
 
     // Convert JSON string to object (if needed)
     if (typeof previousWorkData === "string") {
         try {
             previousWorkData = JSON.parse(previousWorkData);
         } catch (e) {
             console.error("Error parsing previous work data:", e);
             previousWorkData = [];
         }
     }
     previousWorkData = JSON.parse(previousWorkData);
     $("#previousWorkContainer").empty();
 
     if (Array.isArray(previousWorkData) && previousWorkData.length > 0) {
         console.log('true condition');
 
         // I-update ang workCount para hindi mag-reset
         workCount = previousWorkData.length;
 
         previousWorkData.forEach((work, index) => {
             addPreviousWork(index + 1, work.companyName, work.address, work.position, work.start, work.end);
         });
     } else {
         console.log('false condition');
         workCount = 0; // Reset lang kung walang previous work
     }
 });
 
 // Function to add previous work dynamically
 function addPreviousWork(workNumber, companyName = "", address = "", position = "", start = "", end = "") {
     let workEntry = `
         <div class="previous-work-entry bg-white p-6 rounded-2xl shadow-lg border border-gray-300 mb-4">
             <div class="mb-5 text-center">
                 <h6 class="text-lg font-semibold text-gray-800">Previous Work ${workNumber}</h6>
                 <hr class="mt-2 border-gray-300">
             </div>
             
             <div class="mb-4">
                 <label class="block text-sm font-medium text-gray-700">Company Name</label>
                 <input type="text" name="companyName[]" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" value="${companyName}" required>
             </div>
 
             <div class="mb-4">
                 <label class="block text-sm font-medium text-gray-700">Address</label>
                 <input type="text" name="previousWorkAddress[]" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" value="${address}" required>
             </div>
 
             <div class="mb-4">
                 <label class="block text-sm font-medium text-gray-700">Position</label>
                 <input type="text" name="previousWorkPosition[]" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" value="${position}" required>
             </div>
 
             <div class="grid grid-cols-2 gap-4 mb-4">
                 <div>
                     <label class="block text-sm font-medium text-gray-700">Start</label>
                     <input type="text" name="previousWorkStart[]" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" value="${start}" required>
                 </div>
                 <div>
                     <label class="block text-sm font-medium text-gray-700">End</label>
                     <input type="text" name="previousWorkEnd[]" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" value="${end}" required>
                 </div>
             </div>
 
             <button type="button" class="removeWork px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 w-full transition-all duration-200">Remove</button>
         </div>
     `;
 
     $("#previousWorkContainer").append(workEntry);
 }
 
 // Add Previous Work Manually
 $(document).ready(function() {
     $('#addPreviousWork').click(function() {
         workCount++; // Increment sa existing count
         addPreviousWork(workCount);
     });
 
     // Remove work entry
     $(document).on('click', '.removeWork', function() {
         $(this).closest('.previous-work-entry').remove();
         workCount--; // Decrement kapag nag-remove
     });
 });
 




 // Close Modal
 $("#close_alumni_modal").click(function() {
    $("#update_alumni_modal").fadeOut();
});

// Close Modal when clicking outside the modal content
$("#update_alumni_modal").click(function(event) {
    if ($(event.target).is("#update_alumni_modal")) {
        $("#update_alumni_modal").fadeOut();
    }
});







 
 $('#frmUpdateAlumni').submit(function(event){
    event.preventDefault(); // Prevent form submission
  
    $('.spinner').show();
    $('#btnRegister').prop('disabled', true);
  
    
  
    // Validate image file type
    var fileInput = $('#profilePict')[0];
    var file = fileInput.files[0];
    if (file && !file.type.startsWith('image/')) {
      alertify.error('Please upload a valid image file!');
      return;
    }
  
    let formData = new FormData();
    formData.append('alumni_id', $('#alumni_id').val());
    formData.append('fname', $('#first-name').val());
    formData.append('mname', $('#middle-name').val());
    formData.append('lname', $('#last-name').val());
    formData.append('bday', $('#bday').val());
    formData.append('student_no', $('#studNo').val());
    formData.append('year_enrolled', $('#enrolled_year').val());
    formData.append('year_graduated', $('#graduated_year').val());
    formData.append('campus', $('#campus').val());
    formData.append('course', $('#course').val());
    formData.append('email', $('#email').val());
    formData.append('password', $('#password').val());
    formData.append('requestType', 'UpdateAlumni');
  
    // Append profile picture
    if (file) {
      formData.append('profilePict', file);
    }
  
    // Append current work
    formData.append('current_work[companyName]', $('#current_work_companyName').val());
    formData.append('current_work[address]', $('#current_work_address').val());
    formData.append('current_work[position]', $('#current_work_Position').val());
    formData.append('current_work[start]', $('#current_work_Start').val());
  
    // Append previous work as JSON
    let previousWorks = [];
    $('#previousWorkContainer .bg-white').each(function(){
      let previousWork = {
        companyName: $(this).find('input[name^="companyName"]').val(),
        address: $(this).find('input[name^="previousWork"]').val(),
        position: $(this).find('input[name^="previousWorkPosition"]').val(),
        start: $(this).find('input[name^="previousWorkStart"]').val(),
        end: $(this).find('input[name^="previousWorkEnd"]').val(),
      };
      previousWorks.push(previousWork);
    });
    formData.append('previous_work', JSON.stringify(previousWorks)); // Send as JSON string
  
    $.ajax({
      url: "backend/end-points/controller.php",
      type: 'POST',
      data: formData,
      processData: false, // Important
      contentType: false, // Important
      success: function(response) {
        if(response.trim() === "success") {
          alertify.success('Update successfully!');
          // Delay redirect by 2 seconds to allow message display
          setTimeout(function() {
           location.reload();
          }, 2000);  
  
        } else {
          $('.spinner').hide();
          $('#btnRegister').prop('disabled', false);
          console.log(response);
          alertify.error(response);
        }
      }
    });
  });