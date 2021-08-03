<?php

namespace App\Controllers;

use App\Models\Category;
use App\Controllers\CoreControllers;


/************* MainController ******************* 
  
Je suis le seul controller (pour l'instant)

Mon rôle est de donner les informations nécéssaires
à l'affichage d'une vue.

C'est aussi moi qui fait les require
je suis donc en charge de la méthode show()

Je m'appelle MainController, car je m'occupe UNIQUEMENT de la partie Main
c'est à dire, la page "home"

*******************************************/

class MainController extends CoreControllers{

    // demo dynamique variable

    
    
    public function displayHome(){
        // j'utilise la méthode show avec les bons paramètres
        // je sais que cette méthode doit affiche la page home, obvious, le nom de la méthode
        
        $categoryModel = new Category();
        $allCategoryQueJeCherche = $categoryModel->findAllForHome();

        
        $parametresPourLaVue = [
            "category" => $allCategoryQueJeCherche,
            
        ];

        // TODO à modifier car il manque les infos à afficher, en plus de l'idCategory
        $this->show('home', $parametresPourLaVue);

        
    }
    public function displayLegalNotice(){
        // j'utilise la méthode show avec les bons paramètres
        // je sais que cette méthode doit affiche la page home, obvious, le nom de la méthode
        $this->show('mentions-legales');
    }
    public function displayAbout()
    {
        
        $this->show('about');
    }
    public function displayBlog()
    {
        
        $this->show('blog');
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