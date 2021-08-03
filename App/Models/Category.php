<?php

namespace App\Models;

use PDO;

use App\Utils\Database;
use App\Models\CoreModels;


/*
id	int(10) unsigned Auto Increment	
name	varchar(64)	Le nom de la catégorie
subtitle	varchar(64) NULL	
picture	varchar(128) NULL	L'URL de l'image de la catégorie (utilisée en home, par exemple)
home_order	tinyint(1) [0]	L'ordre d'affichage de la catégorie sur la home (0=pas affichée en home)
created_at	timestamp [current_timestamp()]	La date de création de la catégorie
updated_at	timestamp NULL	La date de la dernière mise à jour de la catégorie
*/
class Category extends CoreModels {
    /**
     * cherche en BDD un objet Category suivant son ID
     *
     * @param int $idCategory Id de la catégorie recherchée
     */
    public function find($idCategory){
        // je récupère ma connexion à la BDD
        $pdo = Database::getPDO();

        // je créer ma requete SQL
       $sql = "SELECT * FROM `category` WHERE `id` = {$idCategory}";

       // je demande à PDO de faire la requete
       $pdoStatement = $pdo->query($sql);

       // je demande à récupérer les données au format objet de type Category
       $categoryFromBase = $pdoStatement->fetchObject(Category::class);

       // le but est de renvoyer l'objet 
       return $categoryFromBase;       
   }

   public function findAll(){

    $pdo = Database::getPDO();

    // je créer ma requete SQL
   $sql = "SELECT * FROM `category`";

   // je demande à PDO de faire la requete
   $pdoStatement = $pdo->query($sql);

   // je demande à récupérer les données au format objet de type Category
   $allCategory = $pdoStatement->fetchAll(PDO::FETCH_CLASS,category::class);

   // le but est de renvoyer l'objet 
   return $allCategory;
   }
   public function findAllForHome(){

    $pdo = Database::getPDO();

    // je créer ma requete SQL
   $sql = "SELECT * FROM `category`
   WHERE `home_order` > 0
   ORDER BY `home_order` ASC";

   // je demande à PDO de faire la requete
   $pdoStatement = $pdo->query($sql);

   // je demande à récupérer les données au format objet de type Category
   $allCategory = $pdoStatement->fetchAll(PDO::FETCH_CLASS,category::class);

   // le but est de renvoyer l'objet 
   return $allCategory;
   }


    private $subtitle;
    private $picture;
    private $home_order;
    

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

}