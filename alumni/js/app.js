$(document).ready(function () {


  $('#FrmRegister').submit(function(event){
    event.preventDefault(); // Prevent form submission
  
    
  
    // Validate passwords
    if ($('#password').val() !== $('#confirm-password').val()) {
      alertify.error('Passwords do not match!');
      return;
    }
  
 
    let formData = new FormData();
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
    formData.append('requestType', 'AlumniRegistration');
  
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
          alertify.success('Account Created successfully!');
        } else {
          console.log(response);
          alertify.error(response);
        }
        
      }
    });
  });
  


  
});
