<?php


namespace App\Controllers;

use App\Models\Brand;
use App\Models\Type;
use App\Models\Product;
use App\Models\Category;

/************* CatalogController ******************* 
  
Je suis le controller de toute la partie Catalogue

Mon rôle est de donner les informations nécéssaires
à l'affichage d'une vue.

C'est aussi moi qui fait les require
je suis donc en charge de la méthode show()

Je m'appelle CatalogController, car je m'occupe UNIQUEMENT de la partie Catalogue
c'est à dire, la page "catalog/category" etc ...

 *******************************************/
// TODO mettre en place l'héritage avec CoreController
class CatalogController extends CoreControllers
{

    /**
     * Méthode afficahnt la liste des produits filtrée par catégorie
     *
     * @param array $parametres tableau de paramètres
     */
    public function displayCategory($parametres)
    {
        if (!$parametres=="") {
            $idCategoryQuiVientDeLaRoute = $parametres['id'];
            $categoryModel = new Category();
            $categoryQueJeCherche = $categoryModel->find($idCategoryQuiVientDeLaRoute);
            $productModel = new Product();
            $produitsQueJeCherche = $productModel->findAllByCategory($idCategoryQuiVientDeLaRoute);
            $parametresPourLaVue = [
                "products" => $produitsQueJeCherche,
                "idCategory" => $idCategoryQuiVientDeLaRoute,
                "category" => $categoryQueJeCherche
            ];
            $this->show('category', $parametresPourLaVue);
        }else{

             
        $categoryModel = new Category();
        $allCategoryQueJeCherche = $categoryModel->findAllForHome();
        $parametresPourLaVue = [
            "category" => $allCategoryQueJeCherche,
            
        ];
    
        $this->show('category_list', $parametresPourLaVue);
        }
        

    }

    public function displayBrand($parametres)
    {
        // j'ai besoin de l'identifiant de la marque pour faire un filtre
        // sur la liste des produits
        // l'identifiant est ici :  $parametres['idBrand']
       
        $idMarqueQuiVientDeLaRoute = $parametres['id'];

        $brandModel = new Brand();
        $marqueQueJeCherche = $brandModel->find($idMarqueQuiVientDeLaRoute);


        // j'ai besoin de l'identifiant de la catégorie pour faire un filtre
        // sur la liste des produits
        // l'identifiant est ici :  $parametres['idCategory']
        
        // on creer un Model Product pour utiliser les méthodes d'accès à la Base (find)
        $productModel = new Product();

        // avec le paramètre de la route, je peut demander les produits
        // de la catégory demandé


        $produitsQueJeCherche = $productModel->findAllByBrand($idMarqueQuiVientDeLaRoute);

        $parametresPourLaVue = [
            "products" => $produitsQueJeCherche,
            "idBrand" => $idMarqueQuiVientDeLaRoute,
            "brand" => $marqueQueJeCherche
        ];
        $this->show('brand', $parametresPourLaVue);
    }

    public function displayType($parametres)
    {
        $idTypeQuiVientDeLaRoute = $parametres['id'];

        $typeModel = new Type();
        $typeQueJeCherche = $typeModel->find($idTypeQuiVientDeLaRoute);


        // j'ai besoin de l'identifiant de la catégorie pour faire un filtre
        // sur la liste des produits
        // l'identifiant est ici :  $parametres['idCategory']
        // TODO aller chercher la liste de produits dans la BDD
        // on creer un Model Product pour utiliser les méthodes d'accès à la Base (find)
        $productModel = new Product();

        // avec le paramètre de la route, je peut demander les produits
        // de la catégory demandé


        $produitsQueJeCherche = $productModel->findAllByType($idTypeQuiVientDeLaRoute);

        $parametresPourLaVue = [
            "products" => $produitsQueJeCherche,
            "idCategory" => $idTypeQuiVientDeLaRoute,
            "type" => $typeQueJeCherche
        ];

        // TODO à modifier car il manque les infos à afficher, en plus de l'idCategory
        $this->show('type', $parametresPourLaVue);
    }

    public function displayProduct($parametres)
    {
        // j'ai besoin de l'identifiant du produit pour faire un filtre
        // sur la liste des produits
        // l'identifiant est ici :  $parametres['idProduct']
        // TODO aller chercher le produit dans la BDD

        // on creer un Model Product pour utiliser les méthodes d'accès à la Base (find)
        $productModel = new Product();

        // avec le paramètre de la route, je peut demander le produit avec son idProduct
        $idQuiVientDeLaRoute = $parametres['id'];

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
}
