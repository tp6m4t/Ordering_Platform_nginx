<?php
	$account = $_COOKIE["account"];
    $password = $_COOKIE["height"];
    $restaurant = $_COOKIE["restaurant"];
    $addclass = $_POST["addclass"];
    $addNT = $_POST["addNT"];
    $addcommodity = $_POST["addcommodity"];

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "INSERT INTO `menu` (`account`, `class`, `commodity`, `NT`) VALUES ('" . $account . "', '" . $addclass . "', '" . $addcommodity . "', '" . $addNT . "');";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );
?>