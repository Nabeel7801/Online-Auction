<?php 
    date_default_timezone_set("Asia/Karachi");
    $t=time(); 
    $user = $_GET['user'];
    $pass = $_GET['pass'];
       
    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $query = "SELECT AdminID, Name FROM admin WHERE Username = '$user' AND Password = '$pass'";
        $result = mysqli_query($connection,$query);
        if ($result) {
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $adminID = $row['AdminID'];
                    $firstName = $row['Name'];
                }
                $hash = substr(md5($user.$t),0,8);
                $status = "active";
                $browser = getBrowser();
                $loginTime = date ("Y-m-d H:i:s", $t);
                $insertQuery = "INSERT INTO onlineadmin (HashKey, LoginTime, Browser, AdminId) VALUES('$hash', '$loginTime', '$browser', '$adminID')"; 
                $result = mysqli_query($connection,$insertQuery);
                
                session_start();
                $_SESSION['redirectTime'] = 0;
                $_SESSION['code'] = $hash;
                $_SESSION['secondCode'] = $t;
                $_SESSION['thirdCode'] = $firstName;
                $_SESSION['fourthCode'] = $user ;
                
                echo "<input type='hidden' id='hiddenCode' value='yes'>";
            }else {
                echo "<input type='hidden' id='hiddenCode' value='no'> ";
            }
            
        }else{
            echo "<script>alert('server error!')</script>";
        }

    }
    
    mysqli_close($connection);


    function getBrowser() {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "N/A";
        
        $browsers = array(
        '/msie/i' => 'Internet explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/mobile/i' => 'Mobile browser'
        );
        
        foreach ($browsers as $regex => $value) {
        if (preg_match($regex, $user_agent)) { $browser = $value; }
        }
        
        return $browser;
    }
?>