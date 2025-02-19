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

         

    }else if($_POST['requestType']=='UpdateAlumni'){
    
                    // Retrieve form data safely
            $alumni_id = $_POST['alumni_id'];
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

            // Encode JSON fields properly
            $current_work = isset($_POST['current_work']) ? json_encode($_POST['current_work'], JSON_UNESCAPED_UNICODE) : '{}';
            $previous_work = isset($_POST['previous_work']) ? json_encode($_POST['previous_work'], JSON_UNESCAPED_UNICODE) : '[]';

            // Fetch existing profile picture from database
            $existingProfilePict = $db->getProfilePicture($alumni_id); // Function to get existing profile picture
            $profilePict = isset($_FILES['profilePict']) ? $_FILES['profilePict'] : null;

            $profileFileName = $existingProfilePict; // Default to existing file

            if ($profilePict && $profilePict['error'] === UPLOAD_ERR_OK) {
                // Get file extension and ensure it’s an image
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
                    // Delete old profile picture if it exists
                    if ($existingProfilePict && file_exists($uploadDir . $existingProfilePict)) {
                        unlink($uploadDir . $existingProfilePict);
                    }

                    $profileFileName = $uniqueFileName;
                } else {
                    echo "Error uploading profile picture.";
                    exit;
                }
            } 

            // Call the AlumniRegistration method
            echo $user = $db->UpdateAlumni($alumni_id,$fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $profileFileName);


    
    }else if($_POST['requestType']=='DeleteAlumni'){

                $alumni_id = $_POST['alumni_id'];
                echo $result = $db->DeleteAlumni($alumni_id);

        


    }else if($_POST['requestType']=='DeleteCampus'){

        $campus_id = $_POST['campus_id'];
        echo $result = $db->DeleteCampus($campus_id);




    }else if($_POST['requestType']=='UpdateCampus'){

             // Retrieve other form data
             $campus_id = $_POST['campus_id'] ?? null;
             $campus_name = $_POST['campus_name'] ?? '';
             $campus_description = $_POST['campus_description'] ?? '';


            $uploadDir = '../../../uploads/';
            $campus_image = null;

            if (isset($_FILES['campus_image']) && $_FILES['campus_image']['error'] === UPLOAD_ERR_OK) {
                // Generate a unique filename using uniqid() and get the file's extension
                $fileExtension = pathinfo($_FILES['campus_image']['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('campus_', true) . '.' . $fileExtension;

                // Set the full file path
                $uploadFile = $uploadDir . $uniqueFileName;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['campus_image']['tmp_name'], $uploadFile)) {
                    $campus_image = $uniqueFileName; // Store the new filename for database update

                    // Fetch existing profile picture from database
                    $existingProfilePict = $db->getCampusPicture($campus_id);

                    // If an existing image is found, delete it
                    if ($existingProfilePict && file_exists($uploadDir . $existingProfilePict)) {
                        unlink($uploadDir . $existingProfilePict);
                    }
                } else {
                    echo json_encode(['status' => '500', 'message' => 'Error uploading the file']);
                    exit;
                }
            }

            $result = $db->UpdateCampus($campus_id, $campus_name, $campus_description, $campus_image);

            // Respond to AJAX
            if ($result == 200) {
                echo json_encode(['status' => '200', 'message' => 'Campus updated successfully']);
            } else {
                echo json_encode(['status' => '500', 'message' => 'Error updating campus']);
            }



    }else {
            echo json_encode(['status' => 'error', 'message' => 'Request type Invalid.']);
        }

}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    
}



 
 ?>
     