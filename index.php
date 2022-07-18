 

<?php
    session_start();
    date_default_timezone_set("Asia/Karachi");
    if (isset($_SESSION['code'])) {
        echo "<script>window.open('home.php','_self');</script>";
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
        <link rel="shortcut icon" sizes="196x196" href="res/images/tabLogo.png">
	     
	    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="theme-color" content="#555">
		
		<meta charset="UTF-8">
		<title>Login</title>
        <link rel="icon" type="image/ico" href="res/images/tabLogo.png" />

        <script src="res/js/jquery.js"></script>
        <script src="res/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="res/js/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="res/js/basic-script.js"></script>
        <script src="res/js/index-script.js"></script>
        <script src="res/js/include.js"></script>
        
        <!-- Screen Styling -->
        <link rel="stylesheet" href="res/css/basic.css">
        <link rel="stylesheet" href="res/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="res/css/font-awesome.css">
        <link rel="stylesheet" href="res/css/style.css">
        
    </head>
	<body>
	    
        <main>
            
            <section id="header">
                <div class="menu_block">

                    <div class="logo" style="margin-left: 20px">

                        <a href="index.php">
                            <span>Custom Clearance<span>   
                        </a>
                    </div>
                </div>

            </section>
            
            <section id="mainPage">

                <div class="mainLoginPage">
                    
                    <div class="form" id="signinForm">
                        <div class="formContent">
                            <div class="formHeader">
                                <div class="avatar">
                                    <img src="res/images/avatar.png" alt="Avatar">
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

                            <div class="formFooter"><span id="openRegister">Don't have an Account?<br> OR <br></span><span id="openModal">Forgot Password?</span></div>
                        </div>
                    </div>

                    <div class="form" id="registerForm">
                        <div class="formContent">		

                            <h4 class="formTitle">Create New Account</h4>	

                            <div class="formBody">
                                
                                <div class="formError" id="registerError"></div>
                                <form onSubmit="return false">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="firstname" id="firstnameR" placeholder="First Name" required="required">		
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id="usernameR" placeholder="Username" required="required">		
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="emailR" placeholder="Email" required="required">	
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="passwordR" placeholder="Password" required="required">	
                                    </div>       
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password2" id="password2R" placeholder="Confirm Password" required="required">	
                                    </div>   
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Register" id="register" class="btn btn-primary btn-lg btn-block login-btn">
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="formFooter" id="openSignin">Already have an Account?</div>
                        </div>
                    </div>

                </div>

                <div class="movingBackground">

                    <div class="movingBgLeft"></div>
                    <div class="movingBgCenter">
                        <div id="registerText">
                            <p>Don't have an Account?</p>
                            <button id="regSignBtn" class="btn btn-primary registerAccount">Register Now</button>
                        </div>
                        <div id="signinText">
                            <p>Already have an Account?</p>
                            <button class="btn btn-primary signinAccount">Sign in</button>
                        </div>
                    </div>
                    <div class="movingBgRight"></div>

                </div>

            </section>

            <!-- Footer -->
            <footer>
                <span id="copyRightLine">&nbsp;&nbsp;&nbsp;Made by: NC Nabeel Ahmed Qureshi, NC Aleena Zahid, PC Shujaat Ali</span>
                <span id="copyRightLine2"> &copy; Custom Clearance  |  All rights reserved</span>
            </footer>

        </main>

        
            
        <!-- Change Password Modal -->
        <div id="myModal" class="modal">
            <div class="modal-dialog modal-CP">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Reset Password</h4>	
                        <button type="button" class="close" id="closeModal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="formError" id="changeError">No such Username Exist</div>

                        <form id ="userVerification" onSubmit="return false">
                            <div class="form-group">
                                <input type="text" class="form-control" id="resetUser" name="username" placeholder="Username" required="required">		
                            </div>   
                            <div class="form-group">
                                <button type="submit" id="UserPass" class="btn btn-primary btn-lg btn-block login-btn">Reset Password</button>
                            </div>
                        </form>

                        <form id ="emailVerification" class="hidden" onSubmit="return false">
                            <div class="form-group">
                                <p>Your Email is <span id="forgotEmail"><span></p>   
                            </div> 
                            <div class="form-group">
                                <input type="email" class="form-control" id="resetEmail" name="email" placeholder="Email" required="required">		
                            </div>
                            <div class="form-group">
                                <button type="submit" id="EmailPass" class="btn btn-primary btn-lg btn-block login-btn">Confirm Email</button>
                            </div>
                        </form>

                        <form id ="codeVerification" class="hidden" onSubmit="return false">
                            <div class="form-group">
                                <p>
                                    Code sent to Email.<br>
                                    Haven't Received yet? 
                                    <button id="forgotResend">Resend</button>

                                </p>   
                            </div> 
                            <div class="form-group">
                                <input type="text" class="form-control" id="resetCode" name="code" placeholder="Enter Code" required="required">		
                            </div>   
                            <div class="form-group">
                                <button type="submit" id="CodePass" class="btn btn-primary btn-lg btn-block login-btn">Reset Password</button>
                            </div>
                        </form>

                        <form id ="resetPassword" class="hidden" onSubmit="return false">
                            
                            <div class="form-group">
                                <input type="password" class="form-control" id="resetPass1" name="pass1" placeholder="Password" required="required">		
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="resetPass2" name="pass2" placeholder="Confirm Password" required="required">		
                            </div>
                            <div class="form-group">
                                <button type="submit" id="ChangePass" class="btn btn-primary btn-lg btn-block login-btn">Change Password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>      

        <div>
            <div id="timeSpace"></div>
            <div class="hidden"  id="hiddenArea"></div>
            <div class="hidden"  id="hiddenArea2"></div>
            <div class="hidden"  id="hiddenArea3"></div>
        </div>
    
	</body>
</html>
