<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifyPassword = $_POST['verify_password'];

    // Validate and sanitize the form data as needed

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alex12";

    // Create a new MySQLi instance
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO nav11 (First_Name, Last_Name, Email_Address, Password, Verify_Password) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $mysqli->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $password, $verifyPassword);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        $response = "Data inserted successfully";
    } else {
        // Error in execution
        $response = "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $mysqli->close();

    // Output the response
    echo $response;
}
?>
