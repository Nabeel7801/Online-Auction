<?php    
    $t1 = time();
    session_start();
    date_default_timezone_set("Asia/Karachi");

    if (!isset($_SESSION['code'])) {
        echo "<script>window.open('index.php','_self');</script>";
    }else {
        $redirectTime = $_SESSION['redirectTime'];
        $hash = $_SESSION['code'];
        $LoginTime = $_SESSION['secondCode'];
        $realName = $_SESSION['thirdCode'];
        $startLetter = substr($realName,0,1);
        $UserName = $_SESSION['fourthCode'];
        $UserTopID = $realName . ' (' . $UserName . ')';

    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" />
        <meta name="theme-color" content="#555">
        <title>Product</title>
        <link rel="icon" type="image/ico" href="res/images/tabLogo.png" />

        <!-- Javascript -->
        <script src="res/js/jquery.js"></script>
        <script src="res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="res/js/include.js"></script>
        <script src="res/js/basic-script.js"></script>
        <script src="res/js/product-script.js"></script>
        
        <!-- Screen Styling -->
        <link rel="stylesheet" href="res/css/basic.css">
        <link rel="stylesheet" href="res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/modalStyle.css">
        <link rel="stylesheet" href="res/css/product-style.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Capriola|Aldrich|Alegreya|Cute Font'>
        
    </head>

    <body>
        
        <div>
            <!-- Header -->
            <section id="header" include="header"></section>

            <!-- Products -->
            <section id="product_catalogue">

                <div class="title">
                    <h2>PRODUCT CATALOGUE</h2>
                    <p>Scroll through the products <br> and choose the best</p>
                </div>

                <!-- PRODUCTS Page -->
                <div id="products">

                    



                </div>

            </section>

            <!-- Footer -->
            <section id="footer"  include="footer"></section>

            <div class="hidden" id="hiddenCode"></div>

        </div>

    </body>

</html>