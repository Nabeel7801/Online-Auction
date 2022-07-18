<?php
    $user = $_GET['user'];
    $pass = $_GET['pass'];
       
    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $query = "UPDATE user SET Password = '$pass' WHERE Username = '$user'";
        $result = mysqli_query($connection,$query);
        if ($result) {
            
            echo "<input type='hidden' id='changePassStatus' value='yes'>";
        }else {
            echo "<input type='hidden' id='changePassStatus' value='no'> ";
        }
    }

?>