<?php


namespace App\Models;

use PDO;
use App\Utils\Database;

class NavBar 
{
    public static function getNavBar()
    {
        $pdo = Database::getPDO();
        $sql = $pdo->prepare("SELECT * FROM `nav` ORDER BY `nav_order`");
        $sql->execute();
        $menuList = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $menuList;
    }
}
