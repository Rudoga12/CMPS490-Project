<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $usernameInput = $_POST["username"];
    $emailInput = $_POST["email"];
    $passwordInput = $_POST["password"];

    // Hash the password (for security)
    $hashedPassword = password_hash($passwordInput, PASSWORD_DEFAULT);

    // Database connection settings
    $servername = "localhost"; // Your database server's IP address or hostname
    $dbUsername = "root";      // Your MySQL username
    $dbPassword = "fall23";    // Your MySQL password
    $dbname = "users";         // Your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert user data into the database
    $sql = "INSERT INTO UserTable (userName, userEmail, userPassword, userPoints) VALUES ('$usernameInput', '$emailInput', '$hashedPassword', 100)";

    if ($conn->query($sql) === TRUE) {
        // Start the session
        session_start();

        // Store user information in the session
        $_SESSION['username'] = $usernameInput;

        // Set a cookie with the session ID
        setcookie('session_id', session_id(), time() + (86400 * 30), '/'); // Cookie expires in 30 days

        // Redirect to MyAccount.php with the 'username' parameter
header("Location: MyAccount.php?username=" . urlencode($usernameInput));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
