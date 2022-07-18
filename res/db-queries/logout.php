<?php

    session_start();
    $hash = $_GET['hash'];

    include '../db-connection/auction.php';
    $deleteQuery = "DELETE FROM onlineuser WHERE HashKey='$hash'";
    $result = mysqli_query($connection,$deleteQuery);
    session_destroy();

?>