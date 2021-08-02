<?php


namespace App\Models;

use PDO;
use App\Utils\Database;

class NavBar
{
    
}

$pdo = Database::getPDO();
$sql = $pdo->prepare("SELECT * FROM `nav`");
$sql->execute();
$menuList = $sql->fetchAll(PDO::FETCH_ASSOC);
