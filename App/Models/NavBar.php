<?php


namespace App\Models;

use PDO;

use App\Utils\Database;

class NavBar 
{
    public static function getNavBar()
    {
        $pdo = Database::getPDO();
        $sql = $pdo->prepare("SELECT * FROM `nav` where `nav`.`nav_order`> 0 ORDER BY `nav_order`");
        $sql->execute();
        $menuList = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $menuList;
    }
    public static function getNavItem($id)
    {
        $pdo = Database::getPDO();
        $sql = $pdo->prepare("SELECT * FROM `nav` where `nav`.`id`= $id ORDER BY `nav_order`");
        $sql->execute();
        $menuList = $sql->fetchObject(NavBar::class);
        return $menuList;
    }
}
