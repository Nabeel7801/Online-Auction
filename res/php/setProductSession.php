<?php

    $productID = $_GET['productID'];
    session_start();
    $_SESSION['productID'] = $productID;
?>