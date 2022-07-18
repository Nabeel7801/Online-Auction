<?php

    $productID = 0;
    $title = '';
    $startDate = '';
    $minimumBid = 0;


    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        
        $query = "SELECT p.ProductID, p.ProductTitle, a.StartTime, a.StartingPrice FROM product AS p
                    INNER JOIN auctiondetails AS a
                        ON p.ProductID = a.ProductID";
        $result = mysqli_query($connection,$query);
        if ($result) {
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $productID = $row['ProductID'];
                    $title = $row['ProductTitle'];
                    $startDate = $row['StartTime'];
                    $minimumBid = $row['StartingPrice'];
                    $src = 'res/images/products/' . $productID . '/img.jpg';

                    echo "<div class='product_card'>

                            <div class='imageHolder'>
                                <img src = $src alt='Image of Product' />
                            </div>
                
                            <h4>$title</h4>
                
                            <div class='productsData'>
                                <p class='productLabel'>Auction Date</p>
                                <span class='productSpan'>$startDate<span>
                            </div>
                            <div class='productsData'>
                                <p class='productLabel'>Minimum Bid</p>
                                <span class='productSpan'>Pkr <span class='minBid'>$minimumBid</span></span>
                                <span class='view_button' id=$productID>Bid Now</span>
                            </div>
                
                        </div> ";

                }
            }
        }else {
            echo "<script>alert('Server Down')</script>";
        }
    }

    

?>