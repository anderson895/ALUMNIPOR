<?php
include ('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }


    public function get_analytics()
    {
        $query = $this->conn->prepare("
         SELECT  
            (SELECT COUNT(*) FROM `alumni` WHERE `status` = '1') AS total_alumni,
            (SELECT COUNT(*) FROM `campus` WHERE `campus_status` = '1') AS total_campus
        ");
    
        if ($query->execute()) {
            $result = $query->get_result()->fetch_assoc();
            // Return the result as JSON
            echo json_encode($result);
            return;
        }
    }
    
    


    public function fetch_alumni(){
        $query = $this->conn->prepare("SELECT * from alumni
        LEFT JOIN campus
        ON campus.campus_id = alumni.campus
        Where status='1'");

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }


    public function fetch_campus(){
        $query = $this->conn->prepare("SELECT * from campus where campus_status='1'");

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }


    
    public function getProfilePicture($alumni_id) {

        $query = "SELECT profile_picture FROM alumni WHERE alumni_id = $alumni_id";
        $result = $this->conn->query($query);
    
        if (!$result) {
            return null;
        }
        $row = $result->fetch_assoc();
    
        return $row ? $row['profile_picture'] : null;
    }
    

    
   public function getCampusPicture($campus_id)
{
    if (empty($campus_id)) {
        return null; // Return null if campus_id is not provided
    }

    $query = $this->conn->prepare("SELECT campus_image FROM campus WHERE campus_id = ?");
    $query->bind_param("i", $campus_id);
    $query->execute();
    $result = $query->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row['campus_image']; // Return the image filename
    } else {
        return null; // Return null if no image found
    }
}


    public function DeleteAlumni($alumni_id) {
        $stmt = $this->conn->prepare("UPDATE alumni SET status = 0 WHERE alumni_id = ?");
        $stmt->bind_param("s", $alumni_id);
        

         // Execute statement
         if ($stmt->execute()) {
            return "success";
        } else {
            return "Error: " . $stmt->error;
        }
    }


    public function DeleteCampus($campus_id) {
        $stmt = $this->conn->prepare("UPDATE campus SET campus_status = 0 WHERE campus_id = ?");
        $stmt->bind_param("s", $campus_id);
        

         // Execute statement
         if ($stmt->execute()) {
            return "success";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    
    

    public function UpdateAlumni($alumni_id,$fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $profileFileName)
    {
        $sql = "UPDATE alumni SET 
                    fname = ?, 
                    mname = ?, 
                    lname = ?, 
                    bday = ?, 
                    current_work = ?, 
                    previous_work = ?, 
                    year_enrolled = ?, 
                    year_graduated = ?, 
                    campus = ?, 
                    course = ?, 
                    email = ?";
    
        // Array for parameter values
        $params = [$fname, $mname, $lname, $bday, $current_work, $previous_work, $year_enrolled, $year_graduated, $campus, $course, $email];
    
        // If profile picture is provided, include it in the update
        if (!empty($profileFileName)) {
            $sql .= ", profile_picture = ?";
            $params[] = $profileFileName;
        }
    
        // Add WHERE condition
        $sql .= " WHERE alumni_id = ?"; 
        $params[] = $alumni_id;
    
        // Prepare statement
        $stmt = $this->conn->prepare($sql);
        
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }
    
        // Create parameter types dynamically
        $paramTypes = str_repeat("s", count($params));
        
        // Bind parameters dynamically
        $stmt->bind_param($paramTypes, ...$params);
    
        // Execute statement
        if ($stmt->execute()) {
            return "success";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    


    public function AddCampus($campus_name, $campus_description, $campus_image)
    {
        // Prepare the SQL query to insert campus data and image filename into the database
        $query = $this->conn->prepare("INSERT INTO `campus` (campus_name, campus_description, campus_image) VALUES (?, ?, ?)");
    
        // Check if the query preparation is successful
        if ($query === false) {
            return false;
        }
    
        // Bind the parameters to the SQL query (ss for strings and s for the image filename)
        $query->bind_param("sss", $campus_name, $campus_description, $campus_image);
    
        // Execute the query
        if ($query->execute()) {
            return 200; // Success
        } else {
            return false; // Failure
        }
    }





    public function UpdateCampus($campus_id, $campus_name, $campus_description, $campus_image)
    {
        try {
            if ($campus_image !== null) {
                $query = $this->conn->prepare("
                    UPDATE `campus` 
                    SET campus_name = ?, campus_description = ?, campus_image = ? 
                    WHERE campus_id = ?
                ");
                $query->bind_param("sssi", $campus_name, $campus_description, $campus_image, $campus_id);
            } else {
                $query = $this->conn->prepare("
                    UPDATE `campus` 
                    SET campus_name = ?, campus_description = ? 
                    WHERE campus_id = ?
                ");
                $query->bind_param("ssi", $campus_name, $campus_description, $campus_id);
            }
    
            if (!$query) {
                return ['status' => 500, 'message' => 'Database query preparation failed.'];
            }
    
            if ($query->execute()) {
                return 200; // Success
            } else {
                return ['status' => 500, 'message' => 'SQL Error: ' . $query->error]; // Log the error
            }
        } catch (Exception $e) {
            return ['status' => 500, 'message' => 'Exception: ' . $e->getMessage()];
        }
    }
    
    
    
    



    public function check_account($admin_id)
    {
     $query = "SELECT * FROM admin WHERE admin_id = $admin_id";
        $result = $this->conn->query($query);
        $items = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items;
    }






    public function Login($username, $password)
{
    // Hash the input password using SHA-256
    $hashedPassword = hash('sha256', $password);

    // Prepare the SQL query
    $query = $this->conn->prepare("SELECT * FROM `admin` WHERE `admin_username` = ? AND `admin_password` = ? AND admin_status = '1'");

    $query->bind_param("ss", $username, $hashedPassword);
    
    // Execute the query
    if ($query->execute()) {
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Start the session and store user info
            session_start();
            $_SESSION['admin_fullname'] = $user['admin_fullname'];
            $_SESSION['admin_id'] = $user['admin_id'];

            return $user;  // Return user data
        } else {
            return false;  // User not found or incorrect credentials
        }
    } else {
        return false;  // Query failed to execute
    }
}


   

    

    
     

}