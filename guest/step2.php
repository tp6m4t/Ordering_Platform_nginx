<?php
    
    $restaurant = $_GET["restaurant"];
    $table = $_GET["table"];

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT `account` FROM `account_number` WHERE `restaurant`='" . $restaurant . "';";
    $result = mysqli_query($database, $query);
    $menu=mysqli_fetch_assoc($result);
    mysqli_close( $database );

    define( "three_hours", 60 * 60 * 3);
    setcookie( "now_restaurant_account", $menu["account"], time() + three_hours );
    setcookie( "now_table", $table, time() + three_hours );
?>