<?php
    $restaurant=$_GET["restaurant"];

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT tables,Take_out FROM `account_number` WHERE restaurant='" . $restaurant . "';";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );


    $menu=mysqli_fetch_assoc($result);
    if($menu["Take_out"]==1 ){
        print("<div id='step2_1'>請選擇您座位的桌號(外帶請輸入0)
            <input id='table' type='number' min='0' max='" . $menu["tables"] . "'/>
            <input type='button' value='確認' onclick='step2();'/>
            <input type='button' value='上一步' onclick='restep1();'/></div>");
    }
    else{
        print("<div id='step2_1'>請選擇您座位的桌號(外帶請輸入0)
            <input id='table' type='number' min='1' max='" . $menu["tables"] . "'/>
            <input type='button' value='確認' onclick='step2();'/>
            <input type='button' value='上一步' onclick='restep1();'/></div>");
    }
?>