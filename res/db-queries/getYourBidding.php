<?php

    $userID = $_GET['userID'];
    $productID = $_GET['productID'];

    include '../db-connection/auction.php';
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else {
        $query = "SELECT u.Name, u.Username, b.Amount 
                    FROM bid AS b
                        INNER JOIN user AS u
                            ON u.UserID = b.UserID
                                WHERE u.UserID = '$userID' AND b.ProductID = '$productID'
                                    ORDER BY b.Amount DESC";

        $result = mysqli_query($connection,$query);
        
        if ($result) {

            echo "<table>
                    <thead>
                        <tr>
                            <th scope='col'>Name</th>
                            <th scope='col'>Bid</th>
                        </tr>
                    </thead>
                    <tbody>
            ";

            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    $user = $row['Name'] . " (" . $row['Username'] . " )";
                    $amount = $row['Amount'];

                    echo "                                  
                        <tr>
                            <td>$user</td>
                            <td>$amount</td>
                        </tr>                             
                    ";

                }

            }else {
                echo "<tr>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                ";
            }
            
            echo "</tbody></table>";
            
        }

    }

?>