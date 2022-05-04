<?php
include_once './../define.php';

 // 01 Khởi tạo kết nối PDO với Mysql
 $options = [
    PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8", 	//Hổ trợ CSDL có Tiếng Việt
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION			    //Hiện thị các lỗi, cảnh báo
];

try {
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, $options);
}catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

// 02 Select - fetchAll
$query   = "SELECT `ordering`  FROM `".DB_TABLE."`";
$stmt    = $db->prepare($query);
if($stmt->execute()){
    while ($row = $stmt->fetchAll()) { 
        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
    }
}

// 03 Select - fetch
$query  = "SELECT `id`, `name`, `status`, `ordering` FROM `".DB_TABLE."` WHERE `id` > ? AND `status` = ?";
$id     = 2;
$status = 1;

$stmt   = $db->prepare($query);
if($stmt->execute([$id, $status])){ 
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { 
        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
    }
}

