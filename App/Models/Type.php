<?php

namespace App\Models;

use CoreModels;

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