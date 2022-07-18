<?php

    $user = $_GET['user'];

    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $query = "SELECT Name,Email FROM user WHERE Username = '$user'";
        $result = mysqli_query($connection,$query);
        if ($result) {
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $name = $row['Name'];
                    $email = $row['Email'];
                }
                echo "<input type='hidden' id='emailStatus' value='$email'><input type='hidden' id='nameStatus' value='$name'>";
            }else {
                echo "<input type='hidden' id='emailStatus' value='no'>";
            }
        }else {
            echo "<input type='hidden' id='emailStatus' value='no'>";
        }
    }
?>