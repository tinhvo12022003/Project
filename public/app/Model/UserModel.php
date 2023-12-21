<?php

namespace Main\Autoload;
use PDO;
use PDOException;
class UserModel
{
    public function __construct()
    {
        return true;
    }

    public function Check_User($username, $password): bool
    {
        try {
            $connect = new PDO("mysql:host=localhost;dbname=food_project", "root", "");
        } catch(PDOException $e) {
            echo "Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage();
        }

        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $statment = $connect->prepare($query);
        $statment->execute([$username, $password]);
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Check_Admin($username, $password): bool {
        try {
            $connect = new PDO("mysql:host=localhost;dbname=food_project", "root", "");
        } catch(PDOException $e) {
            echo "Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage();
        }
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $statment = $connect->prepare($query);
        $statment->execute([$username, $password]);
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    
    public function __destruct()
    {
        return true;
    }
}
