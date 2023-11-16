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
    $servername = "localhost"; // Your database server's IP address or hostname
    $dbUsername = "root";           // Your MySQL username
    $dbPassword = "fall23";               // Your MySQL password
    $dbname = "users";              // Your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the connection
    $sql = "INSERT INTO UserTable (userName, userEmail, userPassword, userPoints) VALUES ('$usernameInput', '$emailInput', '$hashedPassword', 100)";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. You gained 100 points.";
        // Add a button to go to MyAccount.html
        echo '<form action="MyAccount.html" method="get">';
        echo '<button type="submit">Go to My Account</button>';
        echo '</form>';

        // Close the database connection
        $conn->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
