<?php
    $now_restaurant_account=$_COOKIE["now_restaurant_account"];
    

    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT class , commodity,NT,id FROM menu INNER JOIN account_number ON menu.account=account_number.account WHERE menu.account=" . $now_restaurant_account . " ORDER BY class ASC;";
    $result = mysqli_query($database, $query);
    $oclass = "";
    $countmenu=0;
    mysqli_close( $database );
    
    $n=0;
    while($menu=mysqli_fetch_assoc($result)){
        if($oclass!=$menu["class"] ){
            if($countmenu!=0 ){print("</table></div>");}
            $n=$n+1;
            $oclass=$menu["class"];
            print("<input class='a' id='tab" . $n . "' type='radio' name='tab' />");
            print("<label for='tab" . $n . "'>". $menu["class"] ."</label>");
            print("<div class='tab_content'><table>");
            $countmenu = $countmenu+1;
        }
        print("<tr><td class='name'>". $menu["commodity"]."</td><td class='NT'>" . $menu["NT"] . "$</td><td>數量 : <input value ='0' class='number' id='" . $menu["id"] . "' type='number' min='0' /></td></tr>");
    }
    
    if($countmenu==0){
        print("<p>還未建立菜單<p>");
    }
    else{print("</table></div><input type='button' onclick='GO();' value='送出' />");}
?>