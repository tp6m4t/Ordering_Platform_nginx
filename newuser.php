﻿<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>螈蛭科技菜單系統</title>
</head>
<body>
    <?php
        header("Content-Type:text/html; charset=utf-8");
        $password=$_POST["password"];
        $account=$_POST["account"];
        $restaurant=$_POST["restaurant"];

        $query = "SELECT * FROM `account_number` WHERE 1";

        $database = mysqli_connect( "localhost", "s1111548", "s1111548");
        mysqli_select_db($database,"hw5_restaurant_menu" );
        $result = mysqli_query($database, $query);
        $row = mysqli_fetch_assoc( $result );
        if(($row["account"]==account)){
            print("<p>此帳號以有人使用</p>" );
            die("<a href='index.html'>請返回首頁重新申請帳號</a>". "</body></html>");
        }
        mysqli_close( $database );
    
        $password=$_POST["password"];
        $account=$_POST["account"];
        $restaurant=$_POST["restaurant"];

        $query = "INSERT INTO `account_number` (`password`, `account`, `restaurant`) VALUES ('". $password . "', '" . $account . "', '" . $restaurant . "');";
        if ( !( $database = mysqli_connect( "localhost", "s1111548", "s1111548") ) )
            die( "Could not connect to database</body></html>" );
	    if ( !mysqli_select_db($database,"hw5_restaurant_menu" ) )
	    	die( "Could not open products database </body></html>" );
	    if ( !( $result = mysqli_query($database, $query) ) )
	    {
	    	print( "<p>Could not execute query!</p>" );
	    	die( mysqli_error() . "</body></html>" );
	    }
	    mysqli_close( $database );
    ?>
    <h1>已成功建立帳戶</h1>
    <a href="index.html">請返回首頁登入</a>
</body>
</html>