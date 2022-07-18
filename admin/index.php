 

<?php
    session_start();
    date_default_timezone_set("Asia/Karachi");
    
?>

<!doctype html>
<html lang="en">
	<head>
	    
	    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
        <link rel="apple-touch-icon" href="icon-152.png">
        <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" sizes="196x196" href="../res/images/tabLogo.png">
	     
	    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="theme-color" content="#555">
		
		<meta charset="UTF-8">
		<title>Admin</title>
        <link rel="icon" type="image/ico" href="../res/images/tabLogo.png" />

        <script src="../res/js/jquery.js"></script>
        <script src="../res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="../res/js/basic-script.js"></script>
        <script src="res/js/index-script.js"></script>
        <script src="res/js/include.js"></script>
        
        <!-- Screen Styling -->
        <link rel="stylesheet" href="../res/css/basic.css">
        <link rel="stylesheet" href="../res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="../res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/style.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Capriola|Aldrich|Alegreya|Cute Font'>
        
    </head>
	<body>
	    
        <main>
            
            <header>
                <div class="menu_block">

                    <div class="logo" style="margin-left: 20px">

                        <a href="index.php">
                            <span class="b1">Admin</span>
                            <span class="b1">Po</span><span class="b2">r</span><span class="b3">t</span><span class="b4">a</span><span class="b5">l</span>
                        </a>
                    </div>
                </div>

            </header>

            <section id="loginContainer">
                <div class="mainLoginPage">
                    
                    <div class="form" id="signinForm">
                        <div class="formContent">
                            <div class="formHeader">
                                <div class="avatar">
                                    <img src="../res/images/avatar.png" alt="Avatar">
                                </div>				
                                <h4 class="formTitle">Login</h4>	
                            </div>


                            <div class="formBody">
                                
                                <div class="formError" id="loginError">Wrong Credentials. Try Again</div>
                                <form onSubmit="return false">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">		
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">	
                                    </div>        
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Login" id="submit" class="btn btn-primary btn-lg btn-block login-btn">
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </main>

        <div>
            <div id="timeSpace"></div>
            <div id="hiddenArea" style="display:none"></div>
            <div id="hiddenArea2" style="display:none"></div>
            <div id="hiddenArea3" style="display:none"></div>
        </div>
    
	</body>
</html>
