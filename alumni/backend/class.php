<?php
include ('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }


    public function AlumniLogin($email,$hashedPassword){
         // Prepare the SQL query
         $query = $this->conn->prepare("SELECT * FROM `alumni` WHERE `email` = ? AND `password` = ? AND status = '1'");
    
         // Bind the email and the hashed password
         $query->bind_param("ss", $email, $hashedPassword);
         
         // Execute the query
         if ($query->execute()) {
             $result = $query->get_result();
             if ($result->num_rows > 0) {
                 $user = $result->fetch_assoc();
                 session_start();
                 $_SESSION['alumni_id'] = $user['alumni_id'];
     
                 return "success";
             } else {
                return "error";
             }
         } else {
             return false;
         }
    }




    public function AlumniRegistration($fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $hashed_password, $profilePictPath) {
        // Ensure $this->conn is defined
        if (!isset($this->conn)) {
            die("Database connection not initialized.");
        }
    
        // Prepare SQL statement
        $sql = "INSERT INTO alumni (fname, mname, lname, bday, current_work, previous_work, student_no, year_enrolled, year_graduated, campus, course, email, password, profile_picture)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
        
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }
    
        // Bind parameters
        $stmt->bind_param("sssssssssissss", $fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $hashed_password, $profilePictPath);
    
        // Execute statement
        if ($stmt->execute()) {
            return "success";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    
    


    public function fetch_alumni_campus($campus_id){
        $query = "SELECT * FROM alumni 
        LEFT JOIN campus
        ON campus.campus_id = alumni.campus
        WHERE campus = ?
        ";
        $stmt = $this->conn->prepare($query);  // Use $this->conn instead of $db
        $stmt->bind_param("i", $campus_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $alumni = [];
        while ($row = $result->fetch_assoc()) {
            $alumni[] = $row;
        }
    
        return $alumni;
    }
    


    public function fetch_campus(){
        $query = $this->conn->prepare("SELECT * from campus");

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }





    public function check_account($alumni_id) {
        
        $query = "SELECT * FROM alumni WHERE alumni_id = $alumni_id";
    
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