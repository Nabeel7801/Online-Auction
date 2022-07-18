<?php

    $title = $_GET['title'];
    $make = $_GET['make'];
    $model = $_GET['model'];
    $year = $_GET['year'];
    $fuelType = $_GET['fuelType'];
    $engine = $_GET['engine'];
    $transmission = $_GET['transmission'];
    $color = $_GET['color'];
    $startTime = $_GET['startTime'];
    $startingPrice = $_GET['startingPrice'];
    $duration = $_GET['duration'];
    $minIncrement = $_GET['minIncrement'];

    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
       

        $insertToProduct = "INSERT INTO product
                                VALUES('', '$title', '$make', '$model', '$year', '$fuelType', '$engine', '$transmission', '$color')"; 
        $result = mysqli_query($connection,$insertToProduct);

        if ($result) {
            $prevID = $connection -> insert_id;

            $insertToAuctionDetails = "INSERT INTO auctiondetails
                                    VALUES('$prevID', '$startTime', '$duration', 'Inactive', '$startingPrice', '$minIncrement')"; 
            $result = mysqli_query($connection,$insertToAuctionDetails);


        }
        
    }

?>