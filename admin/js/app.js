$(document).ready(function () {





  $("#frmAddCampus").submit(function (e) {
    e.preventDefault();

    console.log('click');
    

    $('#spinner').show();
    $('#btnAddCampus').prop('disabled', true);
    
    var formData = $(this).serializeArray(); 
    formData.push({ name: 'requestType', value: 'AddCampus' });
    var serializedData = $.param(formData);

    // Perform the AJAX request
    $.ajax({
      type: "POST",
      url: "backend/end-points/controller.php",
      data: serializedData,
      dataType: 'json',
      success: function (response) {

        console.log(response)

        if(response=="200"){
          alertify.success('Login Successful');

          setTimeout(function () {
           location.reload()
          }, 1000);
        }else{
          console.log('hanapin mo ung errror')
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