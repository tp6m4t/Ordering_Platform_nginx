<?php
    $now_table = $_COOKIE["now_table"];
    $now_restaurant_account = $_COOKIE["now_restaurant_account"];

    // 建立資料庫連線
    $database = mysqli_connect("localhost", "s1111548", "s1111548", "hw5_restaurant_menu");
    if (!$database) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // 插入訂單資料並取得自動遞增值
    $stmt = $database->prepare("INSERT INTO `order_all` (`account`, `tables_number`) VALUES (?, ?)");
    $stmt->bind_param("ss", $now_restaurant_account, $now_table);
    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;
    } else {
        die("Query failed: " . $stmt->error);
    }
    $stmt->close();
    mysqli_close($database);

    // 顯示訂單單號
    print("請記住您的單號為 $last_id");

    // 設置 Cookie 保存訂單單號
    define("three_hours", 60 * 60 * 3);
    setcookie("order_only", "", time() - 3600); // 刪除舊 Cookie
    setcookie("order_only", $last_id, time() + three_hours);

    // 暫停 0.5 秒
    usleep(500000);
?>
