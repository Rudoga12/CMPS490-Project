<style>
<?php include 'style.css'; ?>
</style>

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
    $servername = "34.72.210.207"; // Your database server's IP address or hostname
    $dbUsername = "root";           // Your MySQL username
    $dbPassword = "";               // Your MySQL password
    $dbname = "users";              // Your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert user data into the database
    $sql = "INSERT INTO UserTable (userName, userEmail, userPassword) VALUES ('$usernameInput', '$emailInput', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
