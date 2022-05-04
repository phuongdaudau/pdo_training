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

//04 Insert
    // $query = "INSERT INTO `".DB_TABLE."` (`name`, `status`, `ordering`) VALUES (:name, :status, :ordering)";
    // $stmt = $db->prepare($query);
   
    // //C1 Placeholder - Single variable
    // // $stmt->bindParam(':name', $name);
	// // $stmt->bindParam(':status', $status);
    // // $stmt->bindParam(':ordering', $ordering);
    
    // // $name = 'ReactJS';
	// // $status = 1;
    // // $ordering = 10;
    // // $stmt->execute();
    
    // // C2 Placeholder - Array
    // $data = [':name' => 'PHP', ':status' => 0, ':ordering' => 15];
    // $stmt->execute($data);
    //C3 Unamed Placeholder - Single variable

    $query = "INSERT INTO `".DB_TABLE."` (`name`, `status`, `ordering`) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
	// $stmt->bindParam(1, $name);
	// $stmt->bindParam(2, $status);
    // $stmt->bindParam(3, $ordering);
    
    // $name = 'ReactJS 123';
	// $status = 1;
    // $ordering = 10;

    // $stmt->execute();

    // C4 Unamed Placeholder - Array
    $data = ['DEF', 0, 15];  // id
    $stmt->execute($data);
    echo $db->lastInsertId();


