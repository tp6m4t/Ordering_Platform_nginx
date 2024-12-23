<?php
$id_order_only=$_POST["id_order_only"];
$database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "UPDATE `order_all` SET `finish_all`='1'WHERE order_only=". $id_order_only .";";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );
?>