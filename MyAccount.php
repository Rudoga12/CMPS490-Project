<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="FIL Logomark_REVERSED_WEB.png">
    <link rel="stylesheet" href="style.css">
    <title>
        <?php
        // Start the session
        session_start();

        // Check if the username is set in the session
        if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
            // If the session username is not set but the cookie exists, set the session variable
            $_SESSION['username'] = $_COOKIE['username'];
        }

        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
            // Display the user's name as the title if logged in
            echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "'s Account";
        } else {
            // Display a default title if not logged in
            echo "My Account";
        }
        ?>
    </title>
</head>
<body>

    <div class="banner">
        <div class="navbar">
            <a href="Index.php"><img src="FIL Logomark_REVERSED_WEB.png" class="logo"></a>
            <ul>
                <li> <a href="Index.php">Home</a> </li>
                <li> <a href="Events.html">Events</a> </li>
                <!-- <li> <a href="MyAccount.php">My Account</a> </li> -->
                <li> <a href="Donate.php">Donate</a> </li>
                <li> <a href="RaceResults.php">Race Results</a> </li>
                <li> <a href="Cart.php">Cart</a> </li>
            </ul>
        </div>
        <div id="confettis">
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
        </div>

        <div class="navbarfooter">
            <a href="AboutUs.html">About Us/Additional Info</a>
            <a href="https://www.cgi.com/en">Sponsor</a>
            <a href="ContactUs.html">Contact</a>
        </div>

        <div class="content">
            <h1>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['username'])) {
                    // Display the user's name if logged in
                    echo "Welcome back, " . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "!";
                } else {
                    // Display a default title if not logged in
                    echo "My Account";
                }
                ?>
            </h1>

            <!-- Display user information here -->
            <?php
            if (isset($_SESSION['username'])) {
                $userName = $_SESSION['username'];

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

                // Fetch user points from the database
                $sql = "SELECT userPoints FROM UserTable WHERE userName = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $userName);
                $stmt->execute();
                $stmt->bind_result($userPoints);

                if ($stmt->fetch()) {
                    echo "<p>You have $userPoints points.</p>";
                } else {
                    echo "Please Sign Up to Access Your Account.";
                }

                // Close the database connection
                $stmt->close();
                $conn->close();
            } else {
                // Debug statement
                echo "<p>Account Not Made.</p>";

                echo "<p>Please Sign Up to Access Your Account.</p>";
            }
            ?>
        </div>
    </div>

    <main>

    </main>

    <footer>
        <!-- Add footer content here, such as copyright information or links to social media profiles -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
