<?php
    //<option>Dog</option>
    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT account,`restaurant` FROM `account_number`;";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );
    print("<div id='step1_1'>請選擇您要點餐的餐廳<select id='step1_select'>");
    while($menu=mysqli_fetch_assoc($result)){
        print("<option>" . $menu["restaurant"] . "</option>");
    }
    print('</select><input id="button1" type="button" value="確認" onclick="step1();"/></div>');
?>