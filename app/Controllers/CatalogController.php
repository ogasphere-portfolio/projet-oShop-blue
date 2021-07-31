<?php

/************* CatalogController ******************* 
  
Je suis le controller de toute la partie Catalogue

Mon rôle est de donner les informations nécéssaires
à l'affichage d'une vue.

C'est aussi moi qui fait les require
je suis donc en charge de la méthode show()

Je m'appelle CatalogController, car je m'occupe UNIQUEMENT de la partie Catalogue
c'est à dire, la page "catalog/category" etc ...

*******************************************/

class CatalogController {

/**
 * Méthode afficahnt la liste des produits filtrée par catégorie
 *
 * @param array $parametres tableau de paramètres
 */
    public function dysplayCategory($parametres)
    {
        // j'ai besoin de l'identifiant de la catégorie pour faire un filtre
        // sur la liste des produits
        // l'identifiant est ici :  $parametres['idCategory']
        // TODO aller chercher la liste de produits dans la BDD
        // on creer un Model Product pour utiliser les méthodes d'accès à la Base (find)
        $productModel = new Product();

        // avec le paramètre de la route, je peut demander les produits
        // de la catégory demandé
        $idCategoryQuiVientDeLaRoute = $parametres['idCategory'];

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