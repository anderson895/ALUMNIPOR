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
       <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-300 mb-4">
  <div class="mb-5 text-center">
    <h6 class="text-lg font-semibold text-gray-800">Previous Work ${workCount}</h6>
    <hr class="mt-2 border-gray-300">
  </div>
  
  <div class="mb-4">
    <label for="previousWork${workCount}" class="block text-sm font-medium text-gray-700">Address</label>
    <input type="text" id="previousWork${workCount}" name="previousWork${workCount}" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" required>
  </div>
  
  <div class="mb-4">
    <label for="previousWorkPosition${workCount}" class="block text-sm font-medium text-gray-700">Position</label>
    <input type="text" id="previousWorkPosition${workCount}" name="previousWorkPosition${workCount}" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" required>
  </div>
  
  <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
      <label for="previousWorkStart${workCount}" class="block text-sm font-medium text-gray-700">Start</label>
      <input type="text" id="previousWorkStart${workCount}" name="previousWorkStart${workCount}" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>
    <div>
      <label for="previousWorkEnd${workCount}" class="block text-sm font-medium text-gray-700">End</label>
      <input type="text" id="previousWorkEnd${workCount}" name="previousWorkEnd${workCount}" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>
  </div>
  
  <button type="button" class="removeWork px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 w-full transition-all duration-200">Remove</button>
</div>
        
      `);
    });

    
    $(document).on('click', '.removeWork', function(){
      $(this).parent('div').remove();
    });
  });
