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

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" />
		<meta name="theme-color" content="#555">
		<title>Home</title>
		<link rel="icon" type="image/ico" href="res/images/tabLogo.png" />

        <script src="res/js/jquery.js"></script>
        <script src="res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="res/js/superfish.min.js" type="text/javascript"></script>
        <script src="res/js/basic-script.js"></script>
        <script src="res/js/home-script.js"></script>
        
        <!-- Screen Styling -->
        <link rel="stylesheet" href="res/css/basic.css">
        <link rel="stylesheet" href="res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/modalStyle.css">
        <link rel="stylesheet" href="res/css/home-style.css">
        
	</head>
	<body>

        <div id="container">
            
            <!-- Header -->
            <section id="header" include="header"></section>

            <!-- Banner -->
            <section id="startNow">
                <div id="startItems">
                    <div class="tabsHeading" id="StartNowHeading">Welcome to the Auction</div><br>
                    <div id="StartNowData"><?php echo "$realName" ?></div>
                    
                    <div id="startButton">
                        <span id="startInput">Bid Now</span>
                        <i id="chevronRight" class="fa fa-chevron-circle-right fa-lg fa-fw" aria-hidden="true"></i>
                    </div>
                </div>
            </section>
        
            <!-- Contact us -->
            <section id="contactus">

                <div class="contactus_section">

                    <div class="title">
                        <h2>CONTACT US</h2>
                        <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
                    </div>

                    <div class="form_section">

                        <div class="contact_form">
                            <div>
                                <p class="error" id="error1">*This Field cannot remain Empty</p>
                                <input type="text" class="form-control" placeholder="Name" id="nameInput">

                                <p class="error" id="error2">*This Field cannot remain Empty</p>
                                <p class="error" id="error3">*Invalid Email</p>
                                <input type="text" class="form-control" placeholder="Email" id="emailInput">

                                <p class="error" id="error4">*This Field cannot remain Empty</p>
                                <textarea class="form-control" placeholder="Message" id="messageInput"></textarea>

                                <button id="sendemail">SEND</button>
                            </div>
                        </div>
                        <div id="hiddenArea" style="display: none"></div>
                        <div id="hiddenStatus" style="display: none"></div>
                    </div>

                </div>

            </section>

            <!-- Footer -->
            <section id="footer" include="footer"></section>


        </div>
        
        <input type = "hidden" id="redirectTime" value="<?php echo $redirectTime ?>">
        
        <div id="MyHiddenSection">
            <input type="hidden" id="hiddenTime" name="hiddenTime" value="<?php echo $t1 ?>">
            <input type="hidden" id="hiddenUserID" name="hiddenUserID" value="<?php echo $UserTopID ?>">
            <input type="hidden" id="hiddenHash" name="hiddenHash" value="<?php echo $hash ?>">
            
        </div>
	</body>
</html>