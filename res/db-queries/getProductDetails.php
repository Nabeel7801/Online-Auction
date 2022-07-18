<?php

    //$user = $_GET['user'];
    $title = '';
    $make = '';
    $year = 0;
    $fuelType = '';
    $Engine = 0;
    $transmission = '';
    $color = '';

    include 'res/db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $query = "SELECT * FROM product WHERE ProductID = '$productID'";
        $result = mysqli_query($connection,$query);
        if ($result) {
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $title = $row['ProductTitle'];
                    $make = $row['Make'];
                    $model = $row['Model'];
                    $year = $row['Year'];
                    $fuelType = $row['FuelType'];
                    $engine = $row['Engine'];
                    $transmission = $row['Transmission'];
                    $color = $row['Color'];
                }
            }
        }else {
            echo "<script>alert('Server Down')</script>";
        }
    }
?>