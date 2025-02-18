<?php
include ('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function fetch_campus(){
        $query = $this->conn->prepare("SELECT * from campus");

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
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