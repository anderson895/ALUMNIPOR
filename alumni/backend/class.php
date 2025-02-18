<?php
include ('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }








    public function AlumniRegistration($fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $hashed_password) {
        // Ensure $this->conn is defined
        if (!isset($this->conn)) {
            die("Database connection not initialized.");
        }
    
        // Prepare SQL statement
        $sql = "INSERT INTO alumni (fname, mname, lname, bday, current_work, previous_work, student_no, year_enrolled, year_graduated, campus, course, email, password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
        
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }
    
        // Bind parameters
        $stmt->bind_param("sssssssssisss", $fname, $mname, $lname, $bday, $current_work, $previous_work, $student_no, $year_enrolled, $year_graduated, $campus, $course, $email, $hashed_password);
    
        // Execute statement
        if ($stmt->execute()) {
            return "success";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    




    public function fetch_campus(){
        $query = $this->conn->prepare("SELECT * from campus");

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }





    public function check_account($admin_id) {
        // I-sanitize ang admin_id para maiwasan ang SQL injection
        $admin_id = intval($admin_id);
    
        // SQL query para hanapin ang admin_id sa table
        $query = "SELECT * FROM admin WHERE admin_id = $admin_id";
    
        $result = $this->conn->query($query);
    
        // Prepare ang array para sa result
        $items = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items; // Ibabalik ang array ng results o empty array kung walang nahanap
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