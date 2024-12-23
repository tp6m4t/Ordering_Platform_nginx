
<?php
$need=$_POST["need"];
if($need=="menu"){
    $account = $_COOKIE["account"];
    $password = $_COOKIE["password"];
    $restaurant = $_COOKIE["restaurant"];
    
    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT class , commodity,NT FROM menu INNER JOIN account_number ON menu.account=account_number.account WHERE menu.account=" . $account . " ORDER BY class ASC;";
    $result = mysqli_query($database, $query);
    $oclass = "";
    $countmenu=0;

    mysqli_close( $database );
    while($menu=mysqli_fetch_assoc($result)){
        if($oclass!=$menu["class"] ){
            if($oclass==""){
                print("<table><tr><td colspan='2'>". $menu["class"] ."</td></tr>");
            }
            else{
                print("</table><table><tr><td colspan='2'>". $menu["class"] ."</td></tr>");
            }
            $countmenu = $countmenu+1;
            $oclass=$menu["class"];
        }
        print("<tr><td>". $menu["commodity"]."</td><td>" . $menu["NT"] . "</td><td><input type='button' value='刪除菜單' onclick='deletemenu(".'"' . $menu["commodity"] .'"'. ");' /></td></tr>");
    }

    print("</table>");
    if($countmenu==0){
        print("<p>還未建立菜單<p>");
    }
}
else{
    $account = $_COOKIE["account"];
    $password = $_COOKIE["password"];
    $restaurant = $_COOKIE["restaurant"];
    $countmenu = 0;
    
    $database = mysqli_connect( "localhost", "s1111548", "s1111548");
    mysqli_select_db($database,"hw5_restaurant_menu" );
    $query = "SELECT tables,Take_out FROM `account_number` WHERE account=" . $account . ";";
    $result = mysqli_query($database, $query);
    $menu=mysqli_fetch_assoc($result);
    print("<p>目前設定</p>");
    print("<p>目前");
    if($menu["Take_out"]==0 ){print("不");}
    print("開放外帶<p>");
    print("<p>有".$menu["tables"]."個內用桌號</p>" );
    mysqli_close( $database );
}
?>
