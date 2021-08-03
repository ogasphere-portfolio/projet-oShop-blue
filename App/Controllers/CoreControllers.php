<?php

namespace App\Controllers;

use App\Models\Brand;

class CoreControllers{
    
    
    public function show($viewName, $viewData = [])
    {
        
        $absoluteURL = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';

        //dd($viewName);
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__."/../views/{$viewName}.tpl.php";
         // On a ici l'appel au Model car intimement lié au template footer.tpl
        // On a besoin des brand pour le footer
        // on va donc les chercher via le Model et la bonne méthode
        $brandModel = new Brand();
        $allBrandForFooter = $brandModel->findAllForFooter();

        //TODO faire la même chose pour les types
        // 1 . coder la méthode dans le bon Model
        // 2 . appeler cette méthode pour récupérer les listes de types
        // 3 . dans le footer, faire un zoli boucle et afficher le tout
        
        require_once __DIR__.'/../views/footer.tpl.php';

        
    }
}