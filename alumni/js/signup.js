$(document).ready(function(){
    var startYear = 1900;
    var endYear = new Date().getFullYear();
    for(var year = endYear; year >= startYear; year--){
      $('.year').append('<option value="'+year+'">'+year+'</option>');
    }
  });

  $(document).ready(function(){
    let workCount = 0;

    $('#addPreviousWork').click(function(){
      workCount++;
      $('#previousWorkContainer').append(`
       <div class="col-span-2">
          <label for="previousWork${workCount}" class="block text-sm font-medium text-gray-700">Previous Work ${workCount}</label>
          <input type="text" id="previousWork${workCount}" name="previousWork${workCount}" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-green-500" required>
          <button type="button" class="removeWork mt-1 px-2 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">Remove</button>
        </div>
      `);
    });

    
    $(document).on('click', '.removeWork', function(){
      $(this).parent('div').remove();
    });
  });
