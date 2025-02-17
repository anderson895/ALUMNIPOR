$(document).ready(function () {
  $('#FrmRegister').submit(function(event){
    event.preventDefault(); // Prevent form submission

    console.log('click');
    
    // Collect current work data
    let currentWork = {
      companyName: $('#current_work_companyName').val(),
      address: $('#current_work_address').val(),
      position: $('#current_work_Position').val(),
      start: $('#current_work_Start').val(),
    };

    // Collect previous work data into an array
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

    // Construct the data object
    let formData = {
      fname: $('#first-name').val(),
      mname: $('#middle-name').val(),
      lname: $('#last-name').val(),
      bday: $('#bday').val(),
      current_work: currentWork, // Directly store the object
      previous_work: previousWorks, // Directly store the array
      student_no: $('#studNo').val(),
      year_enrolled: $('#enrolled_year').val(),
      year_graduated: $('#graduated_year').val(),
      campus: $('#campus').val(),
      course: $('#course').val(),
      email: $('#email').val(),
      password: $('#password').val(),
      requestType: 'AlumniRegistration' // Add requestType directly to the object
    };

    // Perform the AJAX request
    $.ajax({
      url: "backend/end-points/controller.php",
      type: 'POST',
      data: formData, // Send the object directly
      success: function(response) {
        // Handle success (response from server)
        console.log(response);
        alert('Form submitted successfully!');
      },
      error: function(xhr, status, error) {
        // Handle error
        alert('Something went wrong. Please try again.');
      }
    });
  });
});
