<?php
    header("Content-Type:text/html; charset=utf-8");
    $password=$_POST["password"];
    $account=$_POST["account"];
    $query = "SELECT * FROM `account_number` WHERE account = ". $account." ;";

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $result = mysqli_query($database, $query);
    
    
    while($row = mysqli_fetch_assoc( $result )){
    if(((string)$row["password"])!=((string)$password)){
        print("0");
    }
    else{
        define( "ONE_DAYS", 60 * 60 * 24 * 1 ); // define constant
        setcookie( "account", $account, time() + ONE_DAYS );
        setcookie( "password", $password, time() + ONE_DAYS );
        setcookie( "restaurant", $row["restaurant"], time() + ONE_DAYS );

        print("1");
    }
    }
    mysqli_close( $database );
    
?>