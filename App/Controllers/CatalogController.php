<?php


namespace App\Controllers;

use App\Models\Product;

class CatalogController {

/**
 * Méthode afficahnt la liste des produits filtrée par catégorie
 *
 * @param array $parametres tableau de paramètres
 */
    public function displayCategory($parametres)
    {
       
        $productModel = new Product();
        $idCategoryQuiVientDeLaRoute = $parametres['id'];

        $produitsQueJeCherche = $productModel->findAllByCategory($idCategoryQuiVientDeLaRoute);

        $parametresPourLaVue = [
            "products" => $produitsQueJeCherche,
            "idCategory" => $idCategoryQuiVientDeLaRoute
        ];
        
        // TODO à modifier car il manque les infos à afficher, en plus de l'idCategory
        $this->show('category', $parametresPourLaVue);
    }

    public function dysplayBrand($parametres)
    {
        
        $this->show('brand', $parametres);
    }

    public function dysplayType($parametres)
    {
        
        $this->show('type', $parametres);
    }

    public function dysplayProduct($parametres)
    {
       
        $productModel = new Product();

        $idQuiVientDeLaRoute = $parametres['idProduct'];

        $produitQueJeCherche = $productModel->find($idQuiVientDeLaRoute);

        $parametresPourLaVue = [
            "product" => $produitQueJeCherche,
            "idProduct" => $idQuiVientDeLaRoute
        ];
        // TODO à modifier car il manque les infos à afficher, en plus de l'idProduct
        $this->show('product', $parametresPourLaVue);
    }
     
    /**
     * Fonction qui require les templates HEADER / FOOTER
     * Ainsi que la vue donnée en paramètre
     * Et surtout les informations nécessaire/essentielle à l'affichage vue
     *
     * @param string $viewName le nom du fichier template à inclure
     * @param $viewData Contient toutes les informations que j'ai besoin pour l'affichage
     */
    /* avant de rentrer dans la fonction show
    $viewName = $currentPage;
    $viewData = $weekOpeningHours;
    */
    public function show($viewName, $viewData = [])
    {
        
        $absoluteURL = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';

        
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__."/../views/{$viewName}.tpl.php";
        require_once __DIR__.'/../views/footer.tpl.php';

        
    }
}