<?php
// Start the PHP session
session_start();

// Check if a username is set in the session
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="http://example.com/favicon.png"> <!--CHANGE FAVICON IMAGE-->
    <link rel="stylesheet" href="style.css">
    <title>FIL 5K Run</title>
</head>
<body>
    
    <div class="banner">
        <div class="navbar">
            <img src="running-icon-22.png" class="logo">
            <ul>
                <li> <a href="Index.php">Home</a> </li>
                <?php
                // Check if the username is set in the session
                if(isset($username)) {
                    // Display My Account with the username if set
                    echo '<li> <a href="MyAccount.php?username=' . urlencode($username) . '">My Account</a></li>';
                } else {
                    // Display the regular link if not set
                    echo '<li> <a href="MyAccount.php">My Account</a> </li>';
                }
                ?>
                <li> <a href="Events.html">Events</a> </li>
                <li> <a href="Donate.php">Donate</a> </li>
                <li> <a href="PointSystem.php">Point System</a> </li>
                <li> <a href="Merchandise.php">Merchandise</a> </li>
                <li> <a href="RaceResults.php">Race Results</a> </li>
                <li> <a href="ContactUs.php">Contact Us</a> </li>
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

        <div class="content">
            <h1>This will help you keep track of your points and see what benefits you qualify for.</h1>
            <p>Cash in your points for anything on the Merchandise tab! </p>

            <div class="progress">
                <div class="progress-value"></div>
              </div>
              
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
