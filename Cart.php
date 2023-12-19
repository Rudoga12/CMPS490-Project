<?php
// cart.php

session_start();

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'addToCart') {
        addToCart($_POST['title'], $_POST['price'], $_POST['image']);
        echo json_encode(['success' => true]);
        exit;
    }
}

function addToCart($title, $price, $image) {
    // Example: Storing in session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the item is already in the cart
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] === $title) {
            // If it is, update the quantity or any other logic you want
            $_SESSION['cart'][$key]['quantity'] += 1;
            return;
        }
    }

    // If not, add the item to the cart
    $item = [
        'title' => $title,
        'price' => $price,
        'image' => $image,
        'quantity' => 1, // You can set the initial quantity as needed
    ];

    $_SESSION['cart'][] = $item;
}
*/

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="FIL Logomark_REVERSED_WEB.png">
    <link rel="stylesheet" href="cartstyle.css">
    <script src="store.js" async></script>
    <title>FIL 5K Run</title>
</head>
<body>
    
    <div class="banner">
        <div class="navbar">
            <a href="Index.php"><img src="FIL Logomark_REVERSED_WEB.png" class="logo"></a>
            <ul>
                <li> <a href="Index.php">Home</a> </li>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['username'])) {
                    // Display My Account with the username if logged in
                    echo '<li> <a href="MyAccount.php?username=' . urlencode($_SESSION['username']) . '">My Account</a></li>';
                } else {
                    // Display the regular link if not logged in
                    echo '<li> <a href="MyAccount.php">My Account</a></li>';
                }
                ?>
                <li> <a href="Events.php">Events</a> </li>
                <li> <a href="Donate.php">Donate</a> </li>
                <li> <a href="RaceResults.php">Race Results</a> </li>
                <li> <a href="Cart.php">Merch</a> </li>
            </ul>
        </div>
        <h1>For every 1,000 points you earn, you get a free piece of merch!</h1>
        <div class="navbarfooter">
            <a href="AboutUs.php">About Us/Additional Info</a>
            <a href="ContactUs.php">Contact</a>
            <a href="https://www.cgi.com/en" target="_blank">Sponsor</a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScKNZlrm3AM-yk55BQkzNKZSwdTEm7YwIxkfixDckpmgrdZ3g/viewform?usp=sf_link" target="_blank">Volunteer</a>
        </div>

        <section class="container content-section">
            <h2 class="section-header">MERCH</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">5K T-Shirt</span>
                    <img class="shop-item-image" src="shirt.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$19.99</span>
                        <button class="btn btn-primary shop-item-button" type="button" onclick="addToCartClicked('5K T-Shirt', '$19.99', 'shirt.jpg')">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">5K Hat</span>
                    <img class="shop-item-image" src="5khat.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$15.99</span>
                        <button class="btn btn-primary shop-item-button" type="button" onclick="addToCartClicked('5K Hat', '$15.99', '5khat.jpg')">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
                <!--<?php
                // Display items in the cart
               // if (isset($_SESSION['cart'])) {
                 //   foreach ($_SESSION['cart'] as $item) {
                   //     echo '<div class="cart-row">
                     //           <span class="cart-item cart-column">' . $item['title'] . '</span>
                       //         <span class="cart-price cart-column">' . $item['price'] . '</span>
                         //       <span class="cart-quantity cart-column">' . $item['quantity'] . '</span>
                           // </div>';
                    //}
                //}
                ?>
                -->
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">
                  <!--  <?php
                    // Calculate and display the total price
                    //$totalPrice = 0;
                    //if (isset($_SESSION['cart'])) {
                       // foreach ($_SESSION['cart'] as $item) {
                         //   $totalPrice += $item['price'] * $item['quantity'];
                        //}
                  //  }
                    //echo '$' . number_format($totalPrice, 2);
                    ?>
                </span>
                -->
            </div>
            <button class="btn btn-primary btn-purchase btn-purchase -sm" type="button">PURCHASE</button>
        </section>

    </div>
    <main>

    </main>

    <footer>
        <!-- Add footer content here, such as copyright information or links to social media profiles -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <!-- <script>
        function addToCartClicked(title, price, image) {
            // Use AJAX to send the data to server (addToCart function)
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.success) {
                        alert('Item added to cart!');
                    } else {
                        alert('Failed to add item to cart.');
                    }
                }
            };
            xhr.open("POST", "cart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=addToCart&title=" + encodeURIComponent(title) + "&price=" + encodeURIComponent(price) + "&image=" + encodeURIComponent(image));
        }
    </script>
    -->
</body>
</html>
