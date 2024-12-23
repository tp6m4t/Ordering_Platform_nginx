<?php
    $now_table=$_COOKIE["now_table"];
    $now_restaurant_account=$_COOKIE["now_restaurant_account"];
    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "INSERT INTO `order_all` (`account`, `tables_number`) VALUES ('" . $now_restaurant_account . "', '". $now_table ."');";
    $result = mysqli_query($database, $query);
    $query = "SELECT LAST_INSERT_ID();";
    $result = mysqli_query($database, $query);
    $menu=mysqli_fetch_assoc($result);
    mysqli_close( $database );
    print("請記住您的單號為".($menu["LAST_INSERT_ID()"]) );
    define( "three_hours", 60 * 60 * 3);
    setcookie( "order_only", $menu["LAST_INSERT_ID()"], time() -1 );
    setcookie( "order_only", $menu["LAST_INSERT_ID()"], time() + three_hours );
    usleep(500000);
?>