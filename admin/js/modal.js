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
});