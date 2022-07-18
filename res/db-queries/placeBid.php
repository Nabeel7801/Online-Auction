<?php
    $userID = $_GET['userID'];
    $productID = $_GET['productID'];
    $amount = $_GET['amount'];


    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        $insertQuery = "INSERT INTO bid (UserID, ProductID, Amount) VALUES('$userID', '$productID', '$amount')"; 
        $result = mysqli_query($connection,$insertQuery);
    }

?>