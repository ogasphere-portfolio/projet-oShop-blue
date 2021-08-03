<?php

namespace App\Models;

use PDO;
use app\Utils\Database;
use App\Models\CoreModels as CoreModels;

/*
id	int(10) unsigned Auto Increment	
name	varchar(45)	Le nom de la marque
footer_order	tinyint(1) [0]	L'ordre d'affichage de la marque dans le footer (0=pas affichée dans le footer)
created_at	timestamp [current_timestamp()]	La date de création de la marque
updated_at	timestamp NULL	La date de la dernière mise à jour de la marque
*/
class Brand extends CoreModels {

    /**
     * récupère les marques mises en avant pour le pied de page
     */
    public function findAllForFooter()
    {
        // je récupère ma connexion à la BDD
        $pdo = Database::getPDO();

        // je créer ma requete SQL
        $sql = "SELECT * 
                    FROM `brand`
                    WHERE `footer_order` <> 0
                    ORDER BY `footer_order` ASC";

        // je demande à PDO de faire la requete
        $pdoStatement = $pdo->query($sql);

        // je demande à récupérer les données au format objet de type Brand
        $allBrandForFooter = $pdoStatement->fetchAll(PDO::FETCH_CLASS,'App\Models\Brand');

        // le but est de renvoyer les objets
        return $allBrandForFooter;
    }

    /**
     * L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)
     *
     * @var int
     */
    private $footer_order;

    /**
     * Get l'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)
     *
     * @return  int
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set l'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)
     *
     * @param  int  $footer_order  L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)
     *
     * @return  self
     */ 
    public function setFooter_order(int $footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }
}