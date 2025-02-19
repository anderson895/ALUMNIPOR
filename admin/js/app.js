$(document).ready(function () {


  $("#frmDeleteCampus").submit(function (e) {
    e.preventDefault(); 

    $('#spinner').show();
    $('#btnDeleteCampus').prop('disabled', true);
    
    var formData = new FormData(this);

    formData.append('requestType', 'DeleteCampus');
    
    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: formData,
        processData: false, 
        contentType: false,
        success: function (response) {
            console.log(response);
            if(response.trim() === "success") {
                alertify.success('Delete Successfully');

                setTimeout(function () {
                    location.reload();
                }, 1000);

            }
        },
       
    });
});





  $("#frmDeleteAlumni").submit(function (e) {
    e.preventDefault(); 

    $('#spinner').show();
    $('#btnDeleteAlumni').prop('disabled', true);
    
    var formData = new FormData(this);

    formData.append('requestType', 'DeleteAlumni');
    
    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: formData,
        processData: false, 
        contentType: false,
        success: function (response) {
            console.log(response);
            if(response.trim() === "success") {
                alertify.success('Delete Successfully');

                setTimeout(function () {
                    location.reload();
                }, 1000);

            }
        },
       
    });
});





$("#frmUpdateCampus").submit(function (e) {
  e.preventDefault(); // Prevent default form submission

  // Show spinner and disable submit button
  $('.spinner').show();
  $('#btnUpdateCampus').prop('disabled', true);

  var formData = new FormData(this); // 'this' refers to the form element
  formData.append('requestType', 'UpdateCampus'); // Additional data if needed

  $.ajax({
      type: "POST",
      url: "backend/end-points/controller.php", // Adjust URL if needed
      data: formData,
      processData: false, // Don't process data (needed for FormData)
      contentType: false, // Don't set content-type (browser handles it)
      dataType: "json", // Expect JSON response
      success: function (response) {
          console.log(response); // Debugging

          if (response.status === "200") {
              alertify.success(response.message || 'Campus updated successfully.');

              setTimeout(function () {
                  location.reload();
              }, 1000);
          } else {
              alertify.error(response.message || 'Error updating campus.');
          }
      },
      error: function (xhr, status, error) {
          console.error("AJAX Error:", status, error);
          alertify.error('An unexpected error occurred. Please try again.');
      }
  });
});

  




  $("#frmAddCampus").submit(function (e) {
    e.preventDefault(); // Prevent the default form submission

    
    // Show spinner and disable the submit button
    $('#spinner').show();
    $('#btnAddCampus').prop('disabled', true);
    
    // Create FormData object to handle file and form data together
    var formData = new FormData(this); // 'this' refers to the form element

    // Append additional data to FormData object (if needed)
    formData.append('requestType', 'AddCampus');
    
    // Perform the AJAX request
    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php", // Adjust this URL if necessary
        data: formData,
        dataType: 'json', // Expect JSON response
        processData: false, // Prevent jQuery from converting the data into a query string
        contentType: false, // Prevent jQuery from setting content-type (let the browser do it for file uploads)
        success: function (response) {
            console.log(response);

            // Check the response from the backend
            if(response.status === "200") {
                // Success: Show alert and reload page
                alertify.success('Campus Added Successfully');

                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                // Error: Handle any errors returned from the backend
                console.log('Error: Unable to process request.');
                alertify.error('There was an issue adding the campus.');
            }
        },
       
    });
});



















    $("#frmLogin").submit(function (e) {
      e.preventDefault();
      
  
      $('#spinner').show();
      $('#btnLogin').prop('disabled', true);
      
      var formData = $(this).serializeArray(); 
      formData.push({ name: 'requestType', value: 'Login' });
      var serializedData = $.param(formData);
  
      // Perform the AJAX request
      $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: serializedData,
        dataType: 'json',
        success: function (response) {
  
          console.log(response.status)
  
          if (response.status === "success") {
            alertify.success('Login Successful');
  
            setTimeout(function () {
              window.location.href = "dashboard.php"; 
            }, 1000);
  
          } else {
            $('#spinner').hide();
            $('#btnLogin').prop('disabled', false);
            console.log(response); 
            alertify.error(response.message);
          }
        },
        error: function () {
          $('#spinner').hide();
          $('#btnLogin').prop('disabled', false);
          alertify.error('An error occurred. Please try again.');
        }
      });
    });
});











