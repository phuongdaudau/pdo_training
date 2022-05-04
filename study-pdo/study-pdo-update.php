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

// 03 Update
$query = "UPDATE `".DB_TABLE."` SET `status` = :status, `ordering` = :ord WHERE `id` = :id";
$stmt = $db->prepare($query);

$data = [':status' => 1, ':id' => 3, ':ord' => 15];
$stmt->execute($data);  
// $stmt->bindParam(':status', $status);
// $stmt->bindParam(':id', $id);
// $stmt->bindParam(':ord', $ord);

// $status = 1;
// $id = 1;
// $ord = 69;
// $stmt->execute(); 


