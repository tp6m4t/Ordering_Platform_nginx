<?php
	$account = $_COOKIE["account"];
	$restaurant = $_COOKIE["restaurant"];
	$database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT order_one.id,menu.commodity,order_one.finish,order_one.order_number,menu.class,menu.NT,order_all.tables_number,order_one.id_in_order
        FROM `order_one` 
        INNER JOIN `order_all` ON order_all.order_only=order_one.order_number 
        INNER JOIN menu ON menu.id=order_one.id 
        WHERE order_one.account='" . $account . "' AND order_all.finish_all=0 
        ORDER BY `order_one`.`order_number` DESC, `menu`.`class` ASC, `menu`.`NT` ASC;";
    $result = mysqli_query($database, $query);
    $o_order_number = "";
    $idpro=0;
    $take_order_number_out_loop="";
    $monny=0;
    $Previous_order_number=0;
    mysqli_close( $database );
    while($menu=mysqli_fetch_assoc($result)){
        if($o_order_number!=$menu["order_number"]){
            if($o_order_number != ""){
                print("<tr><td>總計:</td><td>$".$monny."</td><td><input value='訂單完成' type='button' onclick='finish_order(". $Previous_order_number .")' /></td></tr>");;
                print("</table>");
                print('</div>');
                $monny=0;
            }
            print('<div class="order" id="' . $menu["order_number"] . '">');
            print((String)($menu["order_number"])."號訂單&emsp;");
            if($menu["tables_number"]!='0'){
                print($menu["tables_number"]."號桌<table>");
            }
            else{print("外帶<table>");}
            $o_order_number=$menu["order_number"];
        }
        print("<tr><td>".$menu["commodity"]."</td><td>$".(String)($menu["NT"])."</td><td>");
        $monny=$monny+$menu["NT"];
        if($menu["finish"]=="0"){
            print('<input type="button" id="' .$menu["id_in_order"]. '" value="餐點已送出" 
                onclick="finish('.$menu["id_in_order"].')"/>');
            $idpro=$idpro+1;
        }
        else{print("已完成");}
        print("</td></tr>");
        $Previous_order_number=$menu["order_number"];
    }
    if($o_order_number != ""){
        print("<tr><td>總計:</td><td>$".$monny."</td><td><input value='訂單完成' type='button' onclick='finish_order(". $Previous_order_number .")' /></td></tr>");
        print("</table>");
        print('</div>');
    }
    else{print("目前無訂單");}
?>