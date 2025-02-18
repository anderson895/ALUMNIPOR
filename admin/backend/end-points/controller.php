<?php 
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


include('../class.php');

$db = new global_class();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['requestType'] == 'Login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Call the Login method and get the result
        $user = $db->Login($username, $password);

        // Check if login was successful
        if ($user) {
            // Convert the result to JSON format to echo as a response
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'data' => $user
            ]);
        } else {
            // Return JSON error response
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid email or password'
            ]);
        }
    }else if($_POST['requestType']=='AddCampus'){

        
         // Check if file is uploaded and there are no errors
    if (isset($_FILES['campus_image']) && $_FILES['campus_image']['error'] == 0) {
        // Set the upload directory
        $uploadDir = '../../../uploads/';
        
        // Generate a unique filename using uniqid() and get the file's extension
        $fileExtension = pathinfo($_FILES['campus_image']['name'], PATHINFO_EXTENSION);
        $uniqueFileName = uniqid('campus_', true) . '.' . $fileExtension;

        // Set the full file path
        $uploadFile = $uploadDir . $uniqueFileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['campus_image']['tmp_name'], $uploadFile)) {
            // File uploaded successfully, now insert filename into the database
            $campus_name = $_POST['campus_name'];
            $campus_description = $_POST['campus_description'];

            // Assuming the database connection is $db and the method AddCampus is available
            $result = $db->AddCampus($campus_name, $campus_description, $uniqueFileName);

            // Respond to AJAX
            if ($result == 200) {
                echo json_encode(['status' => '200', 'message' => 'Campus added successfully']);
            } else {
                echo json_encode(['status' => '500', 'message' => 'Error adding campus']);
            }
        } else {
            // Error uploading the file
            echo json_encode(['status' => '500', 'message' => 'Error uploading the file']);
        }
    } else {
        // No file uploaded or file error
        echo json_encode(['status' => '400', 'message' => 'No file uploaded or file error']);
    }

         

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Order request failed.']);
    }

}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $response = $db->getPaymentQr();
    echo json_encode(['status' => $response]);
}



 
 ?>
     