<?php

namespace App\Controllers;

use App\Models\Type;
use App\Models\Brand;

class CoreControllers{
    
    
    public function show($viewName, $viewData = [])
    {
         // Pour utiliser $altoRouter partout
        // on utilise une astuce que c'est pas bien de l'utiliser
        // le mot clé global CASSE la portée d'une variable
        global $altoRouter;
        $absoluteURL = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';

        //dd($viewName);
        require_once __DIR__.'/../views/header.tpl.php';

       // Pour avoir des zoli noms de variable dans la vue
        // plutot que d'avoir un tableau
        // je veux transformer $viewData et autant de variable que de clé
        // exemple : j'ai une clé 'product' je veux une variable $product
        // Pour chaque clé du tableau, on a une variable avec le même nom
        // Equivalent à
        // $product = $viewData['product'];
        // $id = $viewData['id'];

        extract($viewData);
        // merci PHP pour le truc facile :+1:

        require_once __DIR__."/../views/{$viewName}.tpl.php";
         // On a ici l'appel au Model car intimement lié au template footer.tpl
        // On a besoin des brand pour le footer
        // on va donc les chercher via le Model et la bonne méthode
        $brandModel = new Brand();
        $allBrandForFooter = $brandModel->findAllForFooter();


        $typeModel = new Type();
        $allTypeForFooter = $typeModel->findAllForFooter();

        //TODO faire la même chose pour les types
        // 1 . coder la méthode dans le bon Model
        // 2 . appeler cette méthode pour récupérer les listes de types
        // 3 . dans le footer, faire un zoli boucle et afficher le tout
        
        require_once __DIR__.'/../views/footer.tpl.php';

        
    }
}