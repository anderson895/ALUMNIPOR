<?php include "../components/header.php";?>

<div class="bg-gray-800 flex items-center justify-center min-h-screen">
  <!-- Forgot Password Area -->
  <?php include "../function/PageSpinner.php"; ?>

  <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">

    <!-- Spinner -->
    <div id="spinner" style="display:none;">
      <div class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
        <div class="w-10 h-10 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
      </div>
    </div>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Forgot Password</h2>
    
    <p class="text-sm text-gray-600 text-center mb-4">
      Enter your email address below, and we'll send you a details of your new password.
    </p>
    
    <form id="frmForgotPassword" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500" required>
      </div>

      <button type="submit" id="btnForgotPassword" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
        Request New Password
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
      Remembered your password? <a href="login.php" class="text-blue-600 hover:text-blue-500">Sign In</a>
    </p>
  </div>
</div>

<?php include "../components/footer.php";?>