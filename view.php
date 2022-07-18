<?php    
    $t1 = time();
    session_start();
    date_default_timezone_set("Asia/Karachi");

    if (!isset($_SESSION['code'])) {
        echo "<script>window.open('index.php','_self');</script>";
    }else if (!isset($_SESSION['productID'])) {
        echo "<script>window.open('product.php','_self');</script>";
    }else {
        $productID = $_SESSION['productID'];
        $redirectTime = $_SESSION['redirectTime'];
        $hash = $_SESSION['code'];
        $LoginTime = $_SESSION['secondCode'];
        $realName = $_SESSION['thirdCode'];
        $startLetter = substr($realName,0,1);
        $UserName = $_SESSION['fourthCode'];
        $UserTopID = $realName . ' (' . $UserName . ')';

        include 'res/db-queries/getAuctionDetails.php';
        include 'res/db-queries/getProductDetails.php';

        $_SESSION['title'] = $title;
        $_SESSION['startTime'] = $startTime;
        $_SESSION['startingPrice'] = $startingPrice;
        $_SESSION['minIncrement'] = $minIncrement;
        $_SESSION['duration'] = $duration;
 
    }
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" />
		<meta name="theme-color" content="#555">
		<title>View</title>
		<link rel="icon" type="image/ico" href="res/images/tabLogo.png" />

        <script src="res/js/jquery.js"></script>
        <script src="res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="res/js/basic-script.js"></script>
        <script src="res/js/view-script.js"></script>
        <script src="res/js/include.js"></script>
        
        <!-- Screen Styling -->
        <link rel="stylesheet" href="res/css/basic.css">
        <link rel="stylesheet" href="res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/modalStyle.css">
        <link rel="stylesheet" href="res/css/view-style.css">

	</head>
	<body>
        
        <div id="container">
            
            <!-- Header -->
            <section id="header" include="header"></section>

            <div class="product_page">

                <section class="image_area">

                    <div id="product_main_image" class="product_main_image">

                        <img id="main_image" src="res/images/products/0001/img.jpg" alt="img of car">

                    </div>

                    <div class="product_other_images">
                        <div class="other_images_area">

                            <span class="scroll_other_img scroll_left"><i class="fa fa-chevron-left"></i></span>
                            
                            <div id="abc" class="otherImagesOuter">
                                <span class="otherImageContainer otherActive" id="img"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img.jpg"></div></span>
                                <span class="otherImageContainer" id="img1"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img1.jpg"></div></span>
                                <span class="otherImageContainer" id="img2"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img2.jpg"></div></span>
                                <span class="otherImageContainer" id="img3"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img3.jpg"></div></span>
                                <span class="otherImageContainer" id="img4"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img4.jpg"></div></span>
                                <span class="otherImageContainer" id="img5"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img5.jpg"></div></span>
                                <span class="otherImageContainer" id="img6"><div class="otherImages"><img alt="socks" src="res/images/products/0001/img6.jpg"></div></span>
                            </div>
                            
                            <span class="scroll_other_img scroll_right"><i class="fa fa-chevron-right"></i></span>

                            <div id="product_name"><?php echo "$productID" ?></div>

                        </div>
                    </div>

                </section>

                <section id="detailAreaOuter">

                    <h2 id="productHeading"><?php echo "$title" ?></h2>

                    <div id="detailAreaInner">

                        <div id="productInfo">
                            <h4 class="innerHeading">PRODUCT DETAILS</h4>

                            <div class="dataRow">
                                <span class="title">Make</span>
                                <span class="data"><?php echo "$make" ?></span>
                            </div>
                            
                            <div class="dataRow">
                                <span class="title">Model</span>
                                <span class="data"><?php echo "$model" ?></span>
                            </div>
                            
                            <div class="dataRow">
                                <span class="title">Year</span>
                                <span class="data"><?php echo "$year" ?></span>
                            </div>

                            <div class="dataRow">
                                <span class="title">Fuel Type</span>
                                <span class="data"><?php echo "$fuelType" ?></span>
                            </div>
                            
                            <div class="dataRow">
                                <span class="title">Engine</span>
                                <span class="data"><?php echo "$engine" ?></span>
                            </div>

                            <div class="dataRow">
                                <span class="title">Transmission</span>
                                <span class="data"><?php echo "$transmission" ?></span>
                            </div>
                            
                            <div class="dataRow">
                                <span class="title">Color</span>
                                <span class="data"><?php echo "$color" ?></span>
                            </div>

                        </div>
                        
                        <div id="bidInfo">

                            <span id="status">&bull; Live</span>

                            <div id="priceArea">
                                <h4 class="innerHeading">BID DETAILS</h4>
                                <p>Base Price</p>
                                <span id="basePrice">Pkr <?php echo "$startingPrice" ?></span>
                            </div>

                            <div id="TimeArea">
                                <h4 class="innerHeading">SALE DETAILS</h4>
                                <p>Auction date</p>
                                <span id="auctionDate"><?php echo "$startTime" ?></span>
                                <p>Duration</p>
                                <span id="duration"><?php echo "$duration" ?> hours</span>

                                <div id="bidNow">Bid Now</div>
                            </div>

                        </div>

                    </div>

                </section>
            </div>

            <input type="hidden" id="serverTime" value = "<?php echo $t1 ?>" >

            <!-- Footer -->
            <section id="footer"  include="footer"></section>


        </div>
        
	</body>
</html>