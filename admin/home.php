<?php
    session_start();
    date_default_timezone_set("Asia/Karachi");

    
    if (!isset($_SESSION['code'])) {
        echo "<script>window.open('index.php','_self');</script>";
    }

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

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="res/js/spartan-multi-image-picker.js"></script>
        
        <script type="text/javascript" src="res/js/home-script.js"></script>
        <script src="../res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="../res/js/basic-script.js"></script>
        
        <script type="text/javascript">
            $(function() {
                $("#coba").spartanMultiImagePicker({
                    fieldName: 'fileUpload[]',
                    directUpload: {
                        status: true,
                        loaderIcon: '<i class="fas fa-sync fa-spin"></i>',
                        url: 'c.php',
                        additionalParam: {
                            name: 'My Name'
                        },
                        success: function(data, textStatus, jqXHR) {},
                        error: function(jqXHR, textStatus, errorThrown) {}
                    }
                });
            });
        </script>

        
        <!-- Screen Styling -->
      
        <link rel="stylesheet" href="../res/css/basic.css">
        <link rel="stylesheet" href="../res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="../res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/style-home.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Capriola|Aldrich|Alegreya|Cute Font'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" crossorigin="anonymous">


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

            <div id="container">

                <div id="sideNavbar">

                    <nav>
                        
                        <ul>
                            
                            <li class="navItem navActive">Add Product</li>
                            
                            <li class="navItem">Edit Product</li>
                            
                            <li class="navItem">Delete Product</li>

                        </ul>
                    </nav>

                </div>

                <div id="mainPage">

                    <section id="addProduct">

                        <div class="title" style="margin: 10px 0;">
                            <h2>ADD NEW PRODUCT</h2>
                        </div>

                        <div id="imagePicker">
                            <div id="coba"></div>
                        </div>

                        <div id="productDetails">

                            <form onSubmit="return false">

                                <div class="form-group">
                                    <input type="text" class="form-control" id="title" placeholder="Product Title" required="required">		
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="make" placeholder="Make" required="required">	
                                </div> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="model" placeholder="Model" required="required">		
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="year" placeholder="Year" required="required">	
                                </div> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="fuelType" placeholder="Fuel Type" required="required">		
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="engine" placeholder="Engine" required="required">	
                                </div> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="transmission" placeholder="Transmission" required="required">		
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="color" placeholder="Color" required="required">	
                                </div> 
                                <div class="form-group">
                                    <input type="datetime-local" class="form-control" id="startTime" placeholder="Start Time" required="required">		
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="startingPrice" placeholder="Starting Price" required="required">	
                                </div> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="duration" placeholder="Duration in seconds" required="required">		
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="minIncrement" placeholder="Minimum Increment" required="required">	
                                </div> 
                                
                                <div class="submitArea">
                                    <input type="submit" name="submit" value="Add to Database" id="addToDatabase" class="btn btn-primary btn-lg btn-block login-btn">
                                </div>

                            </form>

                        </div>

                        <div id="hiddenArea"></div>
                        
                    </section>

                </div>

            </div>

        </main>

	</body>
</html>
