<?php include "../components/header.php";?>

<body class="flex items-center justify-center min-h-screen bg-gray-800">
  
<?php include "../function/PageSpinner.php"; ?>

  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8 relative">

 

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <!-- <img src="assets/logo1.png" alt="Adornasia" class="w-30 h-30 object-contain"> -->
      <i class="fas fa-user-graduate text-blue-500 text-6xl"></i> 
    </div>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">ALUMNI</h2>

    <form id="frmLogin" class="space-y-6">
   <!-- Spinner -->
   <div class="spinner" id="spinner" style="display:none;">
        <div class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
          <div class="w-10 h-10 border-4 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
        </div>
     </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" id="email" name="email" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center">
          <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
        <a href="forgot.php" class="text-sm text-blue-600 hover:text-blue-500">Forgot password?</a>
      </div>


      <div>
        <button type="submit" id="btnLogin" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Sign in
        </button>
      </div>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
      Don't have an account? <a href="signup.php" class="text-blue-600 hover:text-blue-500">Sign up</a>
    </p>
  </div>

  <script src="js/app.js"></script>
</body>
</html>