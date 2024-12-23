<?php
    
    $now_restaurant_account=$_COOKIE["now_restaurant_account"];
    $order_only=$_COOKIE["order_only"];
    $id=$_POST["id"];
    $number=$_POST["number"];

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    
    $query = "INSERT INTO `order_one`(`account`, `id`, `order_number`) VALUES ('". $now_restaurant_account ."','". $id ."','". $order_only ."');";
    for($i=0;$i!=$number;$i++){
        $result = mysqli_query($database, $query);
    }
    mysqli_close( $database );
?>