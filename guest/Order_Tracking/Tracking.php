<?php
    //<option>Dog</option>
    $order=$_GET["order"];
    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT order_one.id,menu.commodity,order_one.finish,order_one.order_number,menu.class,menu.NT,order_all.tables_number,account_number.restaurant
        FROM `order_one` 
        INNER JOIN `order_all` ON order_all.order_only=order_one.order_number 
        INNER JOIN account_number ON account_number.account =order_one.account
        INNER JOIN menu ON menu.id=order_one.id WHERE order_all.order_only=" . $order . " 
        ORDER BY `order_one`.`order_number` DESC, `menu`.`class` ASC, `menu`.`NT` ASC;";
    $result = mysqli_query($database, $query);
    mysqli_close( $database );
    $r=0;
    $monny=0;
    while($menu=mysqli_fetch_assoc($result)){
        if($menu!=null){
            if($r==0){
                print("<table><tr><td colspan='2'>餐廳:" . $menu["restaurant"]."</td><td>單號:". $order . "</td></tr>");
                $r=$r+1;
            }
            print("<tr><td>". $menu["commodity"] ."</td><td>$". $menu["NT"] ."</td><td>");
            $monny=$monny+$menu["NT"];
            if($menu["finish"]==1){
                print("訂單已完成");
            }
            else{
                print("訂單製作中");
            }
            print("</td></tr>");
        }
    }
    if($r!=0){
        print("<tr><td >總計:</td><td>$".$monny."</td></tr></table>");
    }
    else{
        print("查無此訂單");
    }
?>