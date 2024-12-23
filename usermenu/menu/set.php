<?php
    $account = $_COOKIE["account"];
    $password = $_COOKIE["height"];
    $restaurant = $_COOKIE["restaurant"];
    $new_Take_out = $_POST["new_Take_out"];
    $new_tables = $_POST["new_tables"];

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "UPDATE `account_number` SET `Take_out`='" . $new_Take_out . "',`tables`='" . $new_tables . "' WHERE account=" . $account . ";";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );
?>