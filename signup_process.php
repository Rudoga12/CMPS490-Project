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

    // Check if the username is already taken
    $checkUsernameQuery = "SELECT * FROM UserTable WHERE userName = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $usernameInput);
    $checkUsernameStmt->execute();
    $result = $checkUsernameStmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username already taken. Please choose a different username.";
        $checkUsernameStmt->close();
        $conn->close();
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO UserTable (userName, userEmail, userPassword, userPoints) VALUES (?, ?, ?, 100)");
    $stmt->bind_param("sss", $usernameInput, $emailInput, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        // Set a cookie with the username
        setcookie('username', $usernameInput, time() + (86400 * 30), '/'); // Cookie expires in 30 days
        echo "Registration successful. You can now log in.";

        // Redirect to MyAccount.php with the 'username' parameter
        header("Location: MyAccount.php?username=" . urlencode($usernameInput));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
