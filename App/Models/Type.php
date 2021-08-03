<?php

namespace App\Models;

use PDO;
use App\Models\CoreModels as CoreModels;
use app\Utils\Database;

/* 
********* Informations de la BDD
**** extrait du 02/08/2021 par JB

id	int(10) unsigned Auto Increment	
name	varchar(64)	Le nom du type
footer_order	tinyint(1) [0]	L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)
created_at	timestamp [current_timestamp()]	La date de création de la catégorie
updated_at	timestamp NULL	La date de la dernière mise à jour de la catégorie
*/

class Type extends CoreModels{

    /**
     * L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)
     *
     * @var int
     */
    private $footer_order;

    public function findAllForFooter()
    {
        // je récupère ma connexion à la BDD
        $pdo = Database::getPDO();

        // je créer ma requete SQL
        $sql = "SELECT * 
                    FROM `type`
                    WHERE `footer_order` <> 0
                    ORDER BY `footer_order` ASC";

        // je demande à PDO de faire la requete
        $pdoStatement = $pdo->query($sql);

        // je demande à récupérer les données au format objet de type Brand
        $allTypeForFooter = $pdoStatement->fetchAll(PDO::FETCH_CLASS,'App\Models\Type');

        // le but est de renvoyer les objets
        return $allTypeForFooter;
    }
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