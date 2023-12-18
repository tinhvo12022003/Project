<?php
namespace Main\Autoload;


class Check {
    public function check_user($username, $password, $role) : bool{
        include_once __DIR__ . "../../partitial/connect.php";
        $query = "SELECT * FROM User WHERE username = ? AND password = ? AND role = ?";
        $statment = $connect->prepare($query);
        $statment->execute([$username, $password, $role]);
        if($statment->rowCount() == 0){
            return false;
        }
        return true;
    }

    public function check_admin($username, $password, $role) : bool{
        include_once __DIR__ . "../../partitial/connect.php";
        $query = "SELECT * FROM Admin WHERE username = ? AND password = ? AND role = ?";
        $statment = $connect->prepare($query);
        $statment->execute([$username, $password, $role]);
        if($statment->rowCount() == 0){
            return false;
        }
        return true;
    }
}

?>