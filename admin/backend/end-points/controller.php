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
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Order request failed.']);
    }

}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $response = $db->getPaymentQr();
    echo json_encode(['status' => $response]);
}



 
 ?>
     