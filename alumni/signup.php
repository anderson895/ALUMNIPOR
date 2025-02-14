<?php include "../components/header.php" ?>

<div class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg relative space-y-6">
    

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Signup</h2>

    <form id="FrmRegister" class="space-y-4 grid grid-cols-2 gap-4">
      <div class="col-span-2">
        <label for="profilePict" class="block text-sm font-medium text-gray-700">Profile Picture</label>
        <input type="file" id="profilePict" name="profilePict" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>

      <div class="col-span-2 flex space-x-4">
        <div class="flex-1">
            <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" id="first-name" name="first-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>
        <div class="flex-1">
            <label for="middle-name" class="block text-sm font-medium text-gray-700">Middle Name</label>
            <input type="text" id="middle-name" name="middle-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>
        <div class="flex-1">
            <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" id="last-name" name="last-name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>
        </div>


    <div class="col-span-2">
        <label for="bday" class="block text-sm font-medium text-gray-700">Birthday</label>
        <input type="date" id="bday" name="bday" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>
    <div class="col-span-2">
        <label for="currentWork" class="block text-sm font-medium text-gray-700">Current Work</label>
        <input type="text" id="currentWork" name="currentWork" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>

      <div class="col-span-2" id="previousWorkContainer"></div>
      <button type="button" id="addPreviousWork" class="col-span-2 px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Add Previous Work</button>

      <div class="col-span-2">
        <label for="studNo" class="block text-sm font-medium text-gray-700">Student No</label>
        <input type="text" id="studNo" name="studNo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>
      <div>
        <label for="enrolled_year" class="block text-sm font-medium text-gray-700">Year Enrolled</label>
        <select id="enrolled_year" name="enrolled_year" class="year mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
          <option value="">Select Year</option>
        </select>
      </div>
      <div>
        <label for="graduated_year" class="block text-sm font-medium text-gray-700">Year Graduated</label>
        <select id="graduated_year" name="graduated_year" class="year mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
          <option value="">Select Year</option>
        </select>
      </div>
      <div class="col-span-2">
        <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
        <select id="campus" name="campus" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
          <option value="">Select Campus</option>
        </select>
      </div>

      <div>
        <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
        <input type="text" id="course" name="course" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>
      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
      </div>

      <button type="submit" class="col-span-2 w-full py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-opacity-75">Create Account</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Already have an account? <a href="login.php" class="text-green-600 hover:text-green-500">Log in</a>
    </p>
  </div>
</div>

<?php include "../components/footer.php";?>
<script src="js/signup.js"></script>