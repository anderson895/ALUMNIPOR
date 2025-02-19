$(document).ready(function() {

// ALUMNI

    // Open Modal
    $(".Show_delete_alumni_modal").click(function() {
        $("#delete_alumni_modal").fadeIn();
        var alumni_id =  $(this).data('alumni_id');
        $("#alumni_id_delete").val(alumni_id);
    });
    // Close Modal
    $(".close_delete_alumni_modal").click(function() {
        $("#delete_alumni_modal").fadeOut();
    });

    // Close Modal when clicking outside the modal content
    $("#delete_alumni_modal").click(function(event) {
        if ($(event.target).is("#delete_alumni_modal")) {
            $("#delete_alumni_modal").fadeOut();
        }
    });


// CAMPUS


  // Open Modal
  $(".Show_delete_campus_modal").click(function() {
        $("#delete_campus_modal").fadeIn();
        var campus_id =  $(this).data('campus_id');
        var campus_name =  $(this).data('campus_name');
        $("#campus_id_delete").val(campus_id);
        $("#DeleteCampusName").text(campus_name);

        console.log(campus_name);
    });
    // Close Modal
    $(".close_delete_campus_modal").click(function() {
        $("#delete_campus_modal").fadeOut();
    });

    // Close Modal when clicking outside the modal content
    $("#delete_campus_modal").click(function(event) {
        if ($(event.target).is("#delete_campus_modal")) {
            $("#delete_campus_modal").fadeOut();
        }
    });




    // Open Modal
    $("#Show_campus_report_modal").click(function() {
        $("#add_campus_modal").fadeIn();
    });

    // Close Modal
    $("#close_campus_modal").click(function() {
        $("#add_campus_modal").fadeOut();
    });

    // Close Modal when clicking outside the modal content
    $("#add_campus_modal").click(function(event) {
        if ($(event.target).is("#add_campus_modal")) {
            $("#add_campus_modal").fadeOut();
        }
    });


    // update campus modal
     // Open Modal
     $(".Show_update_campus_modal").click(function() {
        $("#update_campus_modal").fadeIn();

       
        

        $("#update_campus_id").val($(this).data('campus_id'));
        $("#update_campus_name").val($(this).data('campus_name'));
        $("#update_campus_description").val($(this).data('campus_description'));
    });

    // Close Modal
    $("#close_campus_modal").click(function() {
        $("#update_campus_modal").fadeOut();
    });

    // Close Modal when clicking outside the modal content
    $("#update_campus_modal").click(function(event) {
        if ($(event.target).is("#update_campus_modal")) {
            $("#update_campus_modal").fadeOut();
        }
    });
});