<?php



namespace App\Models;
use PDO;
use App\Utils\Database;
use App\Models\CoreModels as CoreModels;

class Product  extends CoreModels {
    
   
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    /**
     * méthode qui va chercher un produit, par son ID
     */
    public function find($idProduct)
    {
        
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `product` WHERE `id` = {$idProduct}";
        $pdoStatement = $pdo->query($sql);

        // je demande à récupérer les données au format objet de type Product
        $produitDeLaBase = $pdoStatement->fetchObject('App\Models\Product');
        return $produitDeLaBase;
    }
    
    /**
     * Je cherche tout les produits d'une catégorie
     *
     * @param int $idCategory
     */
    public function findAllByCategory($idCategory) 
    {
        $pdo = Database::getPDO();
        
        
        $sql = "SELECT * FROM `product` WHERE `category_id` = {$idCategory}";
       
        $pdoStatement = $pdo->query($sql);

        $produitsDeLaBase = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');
        
        
        return $produitsDeLaBase;
    }
    public function findAllBy(int $idRubrique, string $nomRubrique) 
    {
      
  
        $pdo = Database::getPDO();
        
        $sql = "SELECT * FROM `product` WHERE `{$nomRubrique}` = {$idRubrique}";
       
        $pdoStatement = $pdo->query($sql);

        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');

        return $result;
    }
    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    
    
    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}