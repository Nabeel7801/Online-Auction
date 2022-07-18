<?php 
    date_default_timezone_set("Asia/Karachi");
    $t=time(); 
    $fname = $_GET['fname'];
    $email = urldecode($_GET['email']);
    $user = $_GET['user'];
    $pass = $_GET['pass'];
       
    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $usernameCheck = "SELECT Username FROM user WHERE Username = '$user'";
        $result = mysqli_query($connection,$usernameCheck);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<input type='hidden' id='alreadyExist' value='yes'>";
            }else {
                echo "<input type='hidden' id='alreadyExist' value='no'>";

                $emailCheck = "SELECT Email FROM login WHERE Email = '$email'";
                $result = mysqli_query($connection,$emailCheck);
                if (mysqli_num_rows($result) > 0) {
                    echo "<input type='hidden' id='emailAlreadyR' value='yes'>";
                }else {
                    echo "<input type='hidden' id='emailAlreadyR' value='no'>";
    
                    $query = "INSERT INTO user (Username, Password, Name, Email) VALUES ('$user', '$pass', '$fname', '$email')";
                    $result = mysqli_query($connection,$query);
                    if ($result) {
                        session_start();
                        $_SESSION['redirectTime'] = 0;
                        $_SESSION['code'] = $hash;
                        $_SESSION['secondCode'] = $t;
                        $_SESSION['thirdCode'] = $RealName;
                        $_SESSION['fourthCode'] = $user ;
                        echo "<input type='hidden' id='registered' value='yes'>";
                    }else {
                        echo "<input type='hidden' id='registered' value='no'>";
                        
                    }
                }
            
            }
            
        }else{
            echo "<script>alert('server error!')</script>";
        }

    }
    
    mysqli_close($connection);
?>