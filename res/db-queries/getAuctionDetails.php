<?php

    $startTime = '';
    $startingPrice = '';
    $minIncrement = '';
    $duration = '';

    include 'res/db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $query = "SELECT StartTime, StartingPrice, Duration, MinimumIncrement FROM auctiondetails WHERE ProductID = '$productID'";
        $result = mysqli_query($connection,$query);
        if ($result) {
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $startTime = $row['StartTime'];
                    $startingPrice = $row['StartingPrice'];
                    $minIncrement = $row['MinimumIncrement'];
                    $duration = $row['Duration'];
                }
            }
        }else {
            echo "<script>alert('Server Down')</script>";
        }
    }
?>