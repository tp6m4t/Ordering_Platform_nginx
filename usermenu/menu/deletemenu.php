<?php
    $where=$_POST["where"];
    $account = $_COOKIE["account"];

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "DELETE FROM `menu` WHERE `commodity`='" . $where . "' AND account=" . $account ;
    $result = mysqli_query($database, $query);
    print($result);
    mysqli_close( $database );
?>