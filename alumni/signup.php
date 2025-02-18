<?php 
include "../components/header.php" ;

include('backend/class.php');

$db = new global_class();


?>

<div class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-3xl bg-white p-10 rounded-lg shadow-lg relative space-y-6">  
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Signup</h2>

    <form id="FrmRegister" class="grid grid-cols-2 gap-6">
       <!-- Spinner -->
    <div class="spinner" id="spinner" style="display:none;">
        <div class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
          <div class="w-10 h-10 border-4 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
        </div>
     </div>

        <!-- Profile picture -->
      <div class="col-span-2">
        <label for="profilePict" class="block text-sm font-medium text-gray-700">Upload Profile Picture</label>
        <input type="file" id="profilePict" name="profilePict" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" accept="image/*" required>
      </div>



            <!-- Name Fields (1 Row) -->
      <div class="col-span-2 grid grid-cols-3 gap-4">
        <div>
          <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
          <input type="text" id="first-name" name="first-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>
        <div>
          <label for="middle-name" class="block text-sm font-medium text-gray-700">Middle Name</label>
          <input type="text" id="middle-name" name="middle-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>
        <div>
          <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
          <input type="text" id="last-name" name="last-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>
      </div>


      <!-- Birthday -->
      <div class="col-span-2">
        <label for="bday" class="block text-sm font-medium text-gray-700">Birthday</label>
        <input type="date" id="bday" name="bday" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>

      <!-- Current Work Section -->
      <div class="col-span-2 bg-white p-6 rounded-2xl shadow-lg border border-gray-300">
        <h6 class="text-lg font-semibold text-gray-800 text-center">Current Work</h6>
        <hr class="mt-2 mb-4 border-gray-300">

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="current_work_companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" id="current_work_companyName" name="current_work_companyName" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          </div>
          <div>
            <label for="current_work_address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="current_work_address" name="current_work_address" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          </div>
          <div>
            <label for="current_work_Position" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" id="current_work_Position" name="current_work_Position" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          </div>
          <div>
            <label for="current_work_Start" class="block text-sm font-medium text-gray-700">Start</label>
            <input type="text" id="current_work_Start" name="current_work_Start" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          </div>
        </div>
      </div>

      <div class="col-span-2" id="previousWorkContainer"></div>
      <button type="button" id="addPreviousWork" class="col-span-2 px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Add Previous Work</button>

      <!-- Student & Education Info -->
      <div>
        <label for="studNo" class="block text-sm font-medium text-gray-700">Student No</label>
        <input type="text" id="studNo" name="studNo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
      </div>
      <div>
        <label for="enrolled_year" class="block text-sm font-medium text-gray-700">Year Enrolled</label>
        <select id="enrolled_year" name="enrolled_year" class="year mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          <option value="">Select Year</option>
        </select>
      </div>
      <div>
        <label for="graduated_year" class="block text-sm font-medium text-gray-700">Year Graduated</label>
        <select id="graduated_year" name="graduated_year" class="year mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          <option value="">Select Year</option>
        </select>
      </div>

      

      <div class="col-span-2">
        <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
        <select id="campus" name="campus" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
          <option value="">Select Campus</option>
          <?php 
            $fetch_campus = $db->fetch_campus();
            foreach ($fetch_campus as $campus): ?>
            <option value="<?=$campus['campus_id']?>"> <?=$campus['campus_name']?></option>
            <?php
                endforeach;
              ?>
        </select>
      </div>

      <div>
        <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
        <input type="text" id="course" name="course" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" required>
      </div>
      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500" >
      </div>

      <button type="submit" id="btnRegister" class="col-span-2 w-full py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:ring-2 focus:ring-green-500">Create Account</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Already have an account? <a href="login.php" class="text-green-600 hover:text-green-500">Log in</a>
    </p>
  </div>
</div>


<?php include "../components/footer.php";?>
<script src="js/signup.js"></script>