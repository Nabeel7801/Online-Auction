<?php    
    $t1 = time();
    session_start();
    date_default_timezone_set("Asia/Karachi");

    if (!isset($_SESSION['code'])) {
        echo "<script>window.open('index.php','_self');</script>";
    }else if (!isset($_SESSION['startTime'])) {
        echo "<script>window.open('product.php','_self');</script>";
    }else {
        $redirectTime = $_SESSION['redirectTime'];
        $hash = $_SESSION['code'];
        $LoginTime = $_SESSION['secondCode'];
        $realName = $_SESSION['thirdCode'];
        $userID = $_SESSION['userID'];
        $UserName = $_SESSION['fourthCode'];
        
        $productID = $_SESSION['productID'];
        $title = $_SESSION['title'];

        $startTime = $_SESSION['startTime'];
        $startingPrice = $_SESSION['startingPrice'];
        $minIncrement = $_SESSION['minIncrement'];
        $duration = $_SESSION['duration'];

    }
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" />
        <meta name="theme-color" content="#555">
        <title>Auction</title>
        <link rel="icon" type="image/ico" href="res/images/tabLogo.png" />

        <!-- Javascript -->
        <script src="res/js/jquery.js"></script>
        <script src="res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="res/js/include.js"></script>
        <script src="res/js/basic-script.js"></script>
        <script src="res/js/auction-script.js"></script>
        <script src="res/js/clock-script.js"></script>
        <script src="res/js/animation-script.js"></script>
        
        <!-- Screen Styling -->
        <link rel="stylesheet" href="res/css/basic.css">
        <link rel="stylesheet" href="res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/modalStyle.css">
        <link rel="stylesheet" href="res/css/auction-style.css">
        <link rel="stylesheet" href="res/css/clock-style.css">
        <link rel="stylesheet" href="res/css/animation-style.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Capriola|Aldrich|Alegreya|Cute Font'>
        
    </head>

    <body>
        
        <main>

            <!-- Header -->
            <section id="header" include="header"></section>

            <section class="page_navigator">
                <span class="page_link" id="firstLink"><a href="product.php">PRODUCTS</a></span>
                <i class="fa fa-chevron-right"></i>
                <span class="page_link"><a href="view.php"><?php echo "$title" ?></a></span>
            </section>

            <!-- Products -->
            <section id="auctionPage">

                <div id="auctionCard">

                    <div id="bodyPart1">

                        <div id="BiddingAnimationArea">
                            <div id="BiddingBox1"></div>
                            <div id="BiddingBox2"></div>
                            <div id="BiddingBox3"></div>
                            <div id="BiddingBox4"><span id="BoxHighestBid1"></span>
                            </div>
                            <div id="BiddingBox5"><span id="BoxHighestBid2"></span></div>
                            <div id="BiddingBox6"><span id="BoxHighestBid3"></span></div>
                            <div id="BiddingBox7"><span id="BoxHighestBid4"></span></div>
                            
                            <div id="focusTriangles">
                                <span id="triangle-topleft"></span>
                                <span id="triangle-topright"></span>
                                <span id="triangle-bottomleft"></span>
                                <span id="triangle-bottomright"></span>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div id="bodyPart2">

                        <div id="recordsArea">
                            
                            <div id="buttonArea">
                                <button class="toggleButton inactiveBtn" id="yourBidding">Your Bidding</button>
                                <button class="toggleButton inactiveBtn" id="allBidding">All Bidding</button>
                            </div>
                            
                            <div id="records">
                                <div id="recordsQuery"></div>
                            </div>

                        </div>

                        <div id="biddingArea">
                            <div id="countdown">
                                <div id= "svgContainer">
                                    <svg id="highestBidderSvg">
                                        <circle r="50" cx="60" cy="60" id="timeOutBackCircle"></circle>
                                        <circle r="50" cx="60" cy="60" id="timeOutCircle"></circle>
                                    </svg>
                                
                                    <span id="countDownText">3</span>
                                    <div id="timeLeftArea">
                                        <span>TimeLeft</span><br>
                                        <span id="timeLeft"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="inputOption">
                                <span style="position: relative"><input type="text" name="bid" id="bid" autocomplete = "off" value = "<?php echo $startingPrice ?>" READONLY><i class="fa fa-gavel" aria-hidden="true"></i></span>
                                <input type="submit" class="bidAdjustments" id="bidDecrease" value="-" style="margin-left: 10px; border-radius: 10px 0 0 10px;">
                                <input type="submit" class="bidAdjustments" id="bidIncrease" value="+" style="border-radius: 0 10px 10px 0;"></br>
                                <input type="submit" class="bidSubmit" value="Bid"  name="post" id="post">
                            
                            </div>
                        </div>
                        
                    </div>
                    
                    <div id="bodyPart3">
                            
                        <div id="clock" class="light">
                            <div class="display" id="clockDisplay">
                                <div class="weekdays"></div>
                                <div class="ampm"></div>
                                <div class="digits"></div>
                            </div>
                        </div>

                        <div id="slideShow">

                            <ol id="slideshowIndicators">
                                <li class="dotActive"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ol>

                            <div id="slideshowInner">
                                <img class="item" id="img" src="res/images/products/0002/img.jpg" alt="img"><!--
                                --><img class="item" id="img1" src="res/images/products/0002/img1.jpg" alt="img"><!--
                                --><img class="item" id="img2" src="res/images/products/0002/img2.jpg" alt="img"><!--
                                --><img class="item" id="img3" src="res/images/products/0002/img3.jpg" alt="img"><!--
                                --><img class="item" id="img4" src="res/images/products/0002/img4.jpg" alt="img"><!--
                                --><img class="item" id="img5" src="res/images/products/0002/img5.jpg" alt="img"><!--
                                --><img class="item" id="img6" src="res/images/products/0002/img6.jpg" alt="img">
                                
                            </div>
                        </div>

                    </div>
                </div>

            </section>

            <!-- Footer -->
            <section id="footer"  include="footer"></section>

            <div id="hiddenArea">
                
                <input type="hidden" id="hiddenStartTime" name="hiddenStartTime" value="<?php echo $startTime ?>">
                <input type="hidden" id="hiddenDuration" name="hiddenDuration" value="<?php echo $duration ?>">
                <input type="hidden" id="hiddenTime" name="hiddenTime" value="<?php echo $t1 ?>">
                <input type="hidden" id="highestBidding" name="highestBidding">
                
                <div class = "hidden" id="productID"><?php echo "$productID" ?></div>
                <div class = "hidden" id="userID"><?php echo "$userID" ?></div>
                <div class="hidden" id="hiddenCode"></div>
                <div class="hidden" id="hiddenOutput"></div>

                <input class="hidden" id='hidden1' value=''>
                <input class="hidden" id='hidden2' value=''>
                <input class="hidden" id='hidden3' value=''>
                <input class="hidden" id='hidden4' value=''>
                
                <input type="hidden" id="minIncrement" value="<?php echo $minIncrement ?>">

            </div> 
               

        </main>

    </body>

</html>