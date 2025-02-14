<?php include "../components/header.php";?>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
  
<?php include "../function/PageSpinner.php"; ?>

  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8 relative">

    <!-- Spinner -->
    <div id="spinner" style="display:none;">
      <div class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
        <div class="w-10 h-10 border-4 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
      </div>
    </div>

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <!-- <img src="assets/logo1.png" alt="Adornasia" class="w-30 h-30 object-contain"> -->
      <i class="fas fa-user-shield text-blue-500 text-6xl"></i>
    </div>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Administrator</h2>

    <form id="frmLogin" class="space-y-6">
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" name="username" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember_me" name="remember_me" type="checkbox" 
                 class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
          <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
        </div>
      </div>

      <div>
        <button type="submit" id="btnLogin" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Sign in
        </button>
      </div>
    </form>
  </div>

  <script src="js/app.js"></script>
</body>
</html>