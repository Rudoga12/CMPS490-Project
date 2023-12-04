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
    <link rel="icon" type="image/x-icon" href="FIL Logomark_REVERSED_WEB.png">
    <link rel="stylesheet" href="style.css">
    <title>FIL 5K Run</title>
</head>
<body>
    
    <div class="banner">
        <div class="navbar">
            <a href="Index.php"><img src="FIL Logomark_REVERSED_WEB.png" class="logo"></a>
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
                <li> <a href="Events.php">Events</a> </li>
                <li> <a href="Donate.php">Donate</a> </li>
                <li> <a href="RaceResults.php">Race Results</a> </li>
                <li> <a href="Cart.php">Merch</a> </li>
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
            <a href="AboutUs.php">About Us/Additional Info</a>
            <a href="ContactUs.php">Contact</a>
            <a href="https://www.cgi.com/en" target="_blank">Sponsor</a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScKNZlrm3AM-yk55BQkzNKZSwdTEm7YwIxkfixDckpmgrdZ3g/viewform?usp=sf_link" target="_blank">Volunteer</a>
          </div>

        <div class="content">
            <h1>The Winner's Circle!</h1>
            <p>Take a look at previous 5k's top runners.</p>
            
            <div class="results">
                <h2>2023</h2>
                <button class="first" type="button"><span></span></button>
                <button class="second" type="button"><span></span></button>
                <button class="third" type="button"><span></span></button>
            </div>

            <div class="2022results">
                <h2>2022</h2>
                <button class="secfirst" type="button"><span></span></button>
                <button class="secsecond" type="button"><span></span></button>
                <button class="secthird" type="button"><span></span></button>
            </div>

            <div class="2021results">
                <h2>2021</h2>
                <button class="thifirst" type="button"><span></span></button>
                <button class="thisecond" type="button"><span></span></button>
                <button class="thithird" type="button"><span></span></button>
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
