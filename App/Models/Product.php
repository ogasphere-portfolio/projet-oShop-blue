<?php



namespace App\Models;
use PDO;
use App\Utils\Database;


class Product {
    
    public $id;
    public $name;
    public $description;
    public $picture;
    public $price;
    public $rate;
    public $status;
    public $created_at;
    public $updated_at;
    public $brand_id;
    public $category_id;
    public $type_id;

    /**
     * méthode qui va chercher un produit, par son ID
     */
    public function find($idProduct)
    {
        
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `product` WHERE `id` = {$idProduct}";
        $pdoStatement = $pdo->query($sql);

        // je demande à récupérer les données au format objet de type Product
        $produitDeLaBase = $pdoStatement->fetchObject('Product');
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

        $produitsDeLaBase = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
        
        
        return $produitsDeLaBase;
    }
}