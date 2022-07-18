<?php

    $productID = $_GET['productID'];
    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        $query = "SELECT u.Name, u.Username, MAX(b.Amount) AS Amount
                    FROM bid AS b
                        INNER JOIN user AS u
                            ON u.UserID = b.userID
                                WHERE b.ProductID = '$productID'
                                    GROUP BY u.Name 
                                        ORDER BY MAX(b.Amount) DESC
                                            LIMIT 4";

        $result = mysqli_query($connection,$query);
        
        if ($result) {

            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    $firstName = $row['Name'];
                    $userName = $row['Username'];
                    $amount = $row['Amount'];

                    $str = $firstName . " (" . $userName . ") = " . $amount;
                    $id = "#hidden" . $i;
                    
                    echo "<script>$('$id').val('$str')</script>";
                    
                    if ($i == 1) {
                        echo "<script>$('#highestBidding').val('$amount');</script>";
                    }
                    
                    $i++;
                }

            }
            
        }

    }

?>