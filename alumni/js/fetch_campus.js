


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
          console.log(response);
            if (response.status === "success") {
                // Empty any previous data
                $("#alumni-list").empty();

                var rows = '';
                $.each(response.alumni, function (index, alumni) {
                  rows += `<tr>
                      <td class="py-2 px-4 border-b text-center">${alumni.fname} ${alumni.lname}</td>
                      <td class="py-2 px-4 border-b text-center">${alumni.course}</td>
                      <td class="py-2 px-4 border-b text-center">${alumni.year_graduated}</td>
                      <td class="py-2 px-4 border-b text-center">${alumni.email}</td>
                      <td class="py-2 px-4 border-b text-center">
                          <button class="view-btn w-auto px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition-all duration-300 ease-in-out"
                              data-campus="${alumni.campus_name}" 
                              data-year_enrolled="${alumni.year_enrolled}" 
                              data-student_no="${alumni.student_no}"  
                              data-previous_work='${JSON.stringify(alumni.previous_work)}' 
                              data-current_work='${JSON.stringify(alumni.current_work)}' 
                              data-bday="${alumni.bday}" 
                              data-fname="${alumni.fname}" 
                              data-lname="${alumni.lname}" 
                              data-course="${alumni.course}" 
                              data-year="${alumni.year_graduated}" 
                              data-email="${alumni.email}" 
                              data-profile_picture="${alumni.profile_picture}">View</button>
                      </td>
                  </tr>`;
                });
                $("#alumni-list").html(rows);

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




$(document).on('click', '.view-btn', function() {
  var fname = $(this).data('fname');
  var lname = $(this).data('lname');
  var course = $(this).data('course');
  var year = $(this).data('year');
  var email = $(this).data('email');
  var campus = $(this).data('campus');
  var year_enrolled = $(this).data('year_enrolled');
  var student_no = $(this).data('student_no');
  var previous_work = $(this).data('previous_work');
  var current_work = $(this).data('current_work');
  var bday = $(this).data('bday');
  var profile_picture = $(this).data('profile_picture');

  // Construct profile image path
  var profileImgPath = profile_picture ? `../uploads/${profile_picture}` : '../uploads/default.jpg';

  // Safe JSON Parsing Function (Handles double-encoded JSON)
  function safeParse(jsonString, defaultValue) {
    try {
      return typeof jsonString === "string" ? JSON.parse(JSON.parse(jsonString)) : jsonString;
    } catch (e) {
      console.error("JSON Parsing Error:", e);
      return defaultValue;
    }
  }

  // Parse current_work JSON
  var currentWorkObj = safeParse(current_work, {});
  var currentWorkHtml = currentWorkObj.companyName ? `
    <div class="p-3 bg-gray-100 rounded-md shadow-sm">
      <p><strong>Company:</strong> ${currentWorkObj.companyName}</p>
      <p><strong>Address:</strong> ${currentWorkObj.address}</p>
      <p><strong>Position:</strong> ${currentWorkObj.position}</p>
      <p><strong>Start:</strong> ${currentWorkObj.start}</p>
    </div>
  ` : "<p class='text-gray-500'>No current work data available.</p>";

  // Parse previous_work JSON and add separators
  var previousWorkArray = safeParse(previous_work, []);
  var previousWorkHtml = previousWorkArray.length > 0 ? previousWorkArray.map((work, index) => `
    <div class="p-3 bg-gray-50 rounded-md shadow-sm mb-3">
      <p><strong>Company:</strong> ${work.companyName}</p>
      <p><strong>Address:</strong> ${work.address}</p>
      <p><strong>Position:</strong> ${work.position}</p>
      <p><strong>Start:</strong> ${work.start}</p>
      <p><strong>End:</strong> ${work.end}</p>
    </div>
    ${index < previousWorkArray.length - 1 ? '<hr class="border-gray-300 my-3">' : ''}
  `).join('') : "<p class='text-gray-500'>No previous work data available.</p>";

  // Set modal content
  $('#modalProfileImg').attr('src', profileImgPath).attr('alt', fname + ' ' + lname);
  $('#modalName').text(fname + ' ' + lname);
  $('#modalCourse').text(course);
  $('#modalYear').text(year);
  $('#modalEmail').text(email);
  $('#modalCampus').text(campus);
  $('#modalYearEnrolled').text(year_enrolled);
  $('#modalStudentNo').text(student_no);
  $('#modalBday').text(bday);
  $('#modalPreviousWork').html(previousWorkHtml);
  $('#modalCurrentWork').html(currentWorkHtml);

  // Show modal
  $('#alumniModal').fadeIn();
});


// Close modal when 'Close' button is clicked
$('.closeAlumniModal').on('click', function() {
  $('#alumniModal').fadeOut();
});

