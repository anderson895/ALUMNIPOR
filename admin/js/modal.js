$(document).ready(function() {
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