$(document).ready(function () {





  $(".select-campus").on("click", function() {
    var campus_id = $(this).data("campus-id");
    var campusname = $(this).data("campus-name");

    $("#campus-name").text(campusname);

    // Make AJAX request to fetch alumni for the selected campus
    $.ajax({
        url: "backend/end-points/controller.php",
        method: "GET",
        data: { campus_id: campus_id,requestType:'fetch_alumni_campus' },
        dataType: "json",
        success: function(response) {
            if (response.status === "success") {
                // Empty any previous data
                $("#alumni-list").empty();

                                // Populate the alumni list
                  $.each(response.alumni, function(index, alumni) {
                    var row = $("<tr></tr>").append(
                        $("<td></td>").addClass("py-2 px-4 border-b text-center").text(alumni.fname + " " + alumni.lname),
                        $("<td></td>").addClass("py-2 px-4 border-b text-center").text(alumni.course),
                        $("<td></td>").addClass("py-2 px-4 border-b text-center").text(alumni.year_graduated),
                        $("<td></td>").addClass("py-2 px-4 border-b text-center").text(alumni.email),
                        $("<td></td>").addClass("py-2 px-4 border-b text-center").html(
                          '<button class="w-auto px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition-all duration-300 ease-in-out">View</button>'
                      )
                      
                    );
                    $("#alumni-list").append(row);
                  });

              
              

                // Show the table with a fade-in effect
                $("#alumni-table").fadeIn();
            } else {
                alert("No alumni found for this campus.");
            }
        },
        error: function() {
            alert("Error fetching data.");
        }
    });
});










  $("#frmLogin").submit(function (e) {
    e.preventDefault();

    $('.spinner').show();
    $('#btnLogin').prop('disabled', true);
    
    var formData = $(this).serializeArray(); 
    formData.push({ name: 'requestType', value: 'AlumniLogin' });
    var serializedData = $.param(formData);

    // Perform the AJAX request
    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: serializedData,  
        success: function (response) {
            if(response.trim() === "success") {
                alertify.success('Login Successful');

                setTimeout(function() {
                    window.location.href = "home.php";
                }, 2000);  

            }else if(response.trim() === "error"){

              console.log(response)
              $('.spinner').hide();
              $('#btnLogin').prop('disabled', false);
              alertify.error('Incorrect Email or Password');

            } else {
                $('.spinner').hide();
                $('#btnLogin').prop('disabled', false);
                console.log(response); 
                alertify.error('Registration failed, please try again.');
            }
        },
    });
  });


















  $('#FrmRegister').submit(function(event){
    event.preventDefault(); // Prevent form submission
  
    $('.spinner').show();
    $('#btnRegister').prop('disabled', true);
  
    // Validate passwords
    if ($('#password').val() !== $('#confirm-password').val()) {
      alertify.error('Passwords do not match!');
      return;
    }
  
    // Validate image file type
    var fileInput = $('#profilePict')[0];
    var file = fileInput.files[0];
    if (file && !file.type.startsWith('image/')) {
      alertify.error('Please upload a valid image file!');
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
          alertify.success('Account Created successfully!');
          // Delay redirect by 2 seconds to allow message display
          setTimeout(function() {
            window.location.href = "login.php";
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
  
  


  
});
