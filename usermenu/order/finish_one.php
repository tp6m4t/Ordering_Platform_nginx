<?php
$id_in_order=$_POST["id_in_order"];
$database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "UPDATE `order_one` SET `finish`='1'WHERE id_in_order=". $id_in_order .";";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );
?>