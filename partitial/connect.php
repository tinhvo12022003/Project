<?php
try {
    
    $connect = new PDO("mysql:host=localhost;dbname=food_project", "root", "");
} catch(PDOException $e) {
    echo "Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage();
    include_once __DIR__ . "/show_error.php";
}

?>