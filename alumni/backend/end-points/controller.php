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
    }else if($_POST['requestType']=='AlumniRegistration'){

        // Retrieve form data safely
    $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $mname = isset($_POST['mname']) ? trim($_POST['mname']) : '';
    $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
    $bday = isset($_POST['bday']) ? trim($_POST['bday']) : '';
    $student_no = isset($_POST['student_no']) ? trim($_POST['student_no']) : '';
    $year_enrolled = isset($_POST['year_enrolled']) ? trim($_POST['year_enrolled']) : '';
    $year_graduated = isset($_POST['year_graduated']) ? trim($_POST['year_graduated']) : '';
    $campus = isset($_POST['campus']) ? trim($_POST['campus']) : '';
    $course = isset($_POST['course']) ? trim($_POST['course']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Hash password using SHA-256
    $hashed_password = hash('sha256', $password);

    // Encode JSON fields properly
    $current_work = isset($_POST['current_work']) ? json_encode($_POST['current_work'], JSON_UNESCAPED_UNICODE) : '{}';
    $previous_work = isset($_POST['previous_work']) ? json_encode($_POST['previous_work'], JSON_UNESCAPED_UNICODE) : '[]';

    // Process uploaded image if it exists
    $profilePict = isset($_FILES['profilePict']) ? $_FILES['profilePict'] : null;
    if ($profilePict && $profilePict['error'] === UPLOAD_ERR_OK) {
        // Get the file extension and ensure it’s an image
        $fileTmpPath = $profilePict['tmp_name'];
        $fileName = $profilePict['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Generate a unique file name
        $uniqueFileName = uniqid('profile_', true) . '.' . $fileExtension;
        $uploadDir = '../../../uploads/';
        $uploadPath = $uploadDir . $uniqueFileName;

        // Validate the file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileExtension, $allowedTypes)) {
            echo "Invalid image type.";
            exit;
        }

        // Move the file to the uploads directory
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // echo "Profile picture uploaded successfully!";
        } else {
            echo "Error uploading profile picture.";
            exit;
        }
    } else {
        // If no profile picture was uploaded
        echo "No profile picture uploaded.";
        exit;
    }

    // Call the AlumniRegistration method
    echo $user = $db->AlumniRegistration($fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $hashed_password, $uniqueFileName); // Pass the path of the uploaded image


         

    }else if($_POST['requestType']=='AlumniLogin'){


        // Retrieve form data safely
        $email = $_POST['email'];
        $password = $_POST['password'];
       

        // Hash password using SHA-256
        $hashed_password = hash('sha256', $password);
        


        echo $user = $db->AlumniLogin($email,$hashed_password);


         

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Order request failed.']);
    }

}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    if($_GET['requestType']=='fetch_alumni_campus'){

        $campus_id=$_GET['campus_id'];

        $response = $db->fetch_alumni_campus($campus_id);

        echo json_encode([
            'status' => 'success',
            'alumni' => $response
        ]);

         

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Order request failed.']);
    }
   
}



 
 ?>
     