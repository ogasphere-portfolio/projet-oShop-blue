<?php
/************* Point d'entrée ******************* 
  
Je suis le point d'entrée
tout le monde passe par moi pour voir le site.

Je m'occupe de récupérer les informations
$_GET, $_POST

Avec ces informations, je choisit quelle vue/template doit être afficher

C'est moi qui dit qu'elle est la page par défaut
puisque c'est moi qui choisit la vue à afficher

Pas d'info => page par défaut
(ça rime donc c'est vrai :D)

*******************************************/

/**********************************
//?    Require des fichiers de classe / functions / BDD / etc ...
**********************************/

// j'ai besoin du fichier pour la function show()
// require __DIR__.'/functions.php';

// Fichier de Composer qui va charger les packages automatiquement
require __DIR__.'/../vendor/autoload.php';
$altoRouter  = new AltoRouter();

require __DIR__.'/Autoloader.php';
require __DIR__.'/../app/fonctions/db.php';
require __DIR__.'/../app/Controllers/MainController.php';
require __DIR__.'/../app/Controllers/NavController.php';
require __DIR__.'/../app/Controllers/CatalogController.php';

require __DIR__.'/../app/Models/NavBar.php';
// var_dump($_GET);
// array (size=1)
//  'page' => string '/home' (length=5)

/**********************************
//?    Je m'occupe de $_GET et je définis la vue à afficher
//?    Par défaut la vue sera 'home'
**********************************/

// exemple de lien : index.php?page=store

// on vérifie que l'utilisateur nous donne bien l'information
// de la page qu'il veux, sinon on lui donne la page par défaut
if (isset($_GET['page'])) {
    // on récupère la page demandé par l'utilisateur
    $currentPage = $_GET['page'];
} else {
    // notre page par défaut
    $currentPage = "/home";
}

//? ici nous avons la même condition mais sur une seule ligne :
//?  expression ternaire (ternaire : 3)
/*
 est ce que isset($_GET['page'])  est VRAI ?
 après le ? le résultat si VRAI
 après le : le résultat si FAUX
*/
// $currentPage = isset($_GET['page']) ? $_GET['page'] : 'home'



/********** Router ************
//?    associer l'URL avec la méthode du controller correspondant
//?    On appelle ça faire des "routes" ou routing 
**********************************/

// On utilise AltoRouteur pour qu'il nous aide à analyser l'URL
$altoRouter = new AltoRouter();
// on fournit a AltoRouter la partie de l'URL à ne pas prendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
// la valeur de $_SERVER['BASE_URI'] est donnée par le .htaccess. Elle correspond à la racine du site => à la route "/"
$altoRouter->setBasePath($_SERVER['BASE_URI']);

// http://altorouter.com/usage/mapping-routes.html


// 1er paramètre : method GET/POST
// 2eme paramètre : URL de la route, ce qui va être analysé
// 3eme paramètre : Tableau controller/method
// 4eme paramètre : identifiant textuel de la route (utilisation ultérieure)
// exemple complet : $altoRouter->map( 'GET', '/', 'render_home', 'home' );


$altoRouter->map( 
    'GET',
    '/', 
        [
            "method" => "affichePageHome",
            "controller" => "MainController"
        ], 
    'home' );

/* $altoRouter->map( 
    'GET',
    '/home', 
    [
        "method" => "affichePageHome",
        "controller" => "MainController"
    ], 
    'home' );
 */

$altoRouter->map( 
    'GET', 
    '/catalog/category/[i:id]',         
    [
        "method" => "affichePageCategory",
        "controller" => "CatalogController"
    ], 
    'category' );

$altoRouter->map( 
    'GET', 
    '/catalog/type/[i:id]',         
    [
        "method" => "affichePageType",
        "controller" => "CatalogController"
    ], 
    'type' );

$altoRouter->map( 
    'GET', 
    '/catalog/marque/[i:id]',         
    [
        "method" => "affichePageMarque",
        "controller" => "CatalogController"
    ], 
    'marque' );

$altoRouter->map( 
    'GET', 
    '/catalog/produit/[i:id]',         
    [
        "method" => "affichePageProduit",
        "controller" => "CatalogController"
    ], 
    'produit' );

    
    



// Je demande à AltoRouteur de chercher dans les routes que je lui ai donné
// et de me rendre les informations de cette route
// c'est à dire le 3eme paramètre
// si aucune route ne correspond $matchingRoute va valoir FAUX (booleen)
$matchingRoute = $altoRouter->match();


var_dump($matchingRoute);
/* $matchingRoute peut ressembler à ça : 
array (size=3)
  'target' => 
    array (size=2)
      'method' => string 'affichePageCategory' (length=19)
      'controller' => string 'CategoryController' (length=18)
  'params' => 
    array (size=1)
      'id' => string '12' (length=2)
  'name' => string 'category' (length=8)
  */

if ($matchingRoute) {
    // j'ai trouvé une route qui correspond
    
    /********** Dispatcher ************
    //?    Grace au nom de la page demandé, on va en déduire le controler/méthode à exécuter
    //?    On appelle ça faire du "dispatch"
    **********************************/

    //? je récupère le nom de la méthode associé à ma route
    $tableauInfo = $matchingRoute['target'];
    $nomMethode = $tableauInfo['method'];
    // DEBUG
    // echo "nomMethode : <br>";
    // var_dump($nomMethode);


    $nomController = $matchingRoute['target']['controller'];
    // la valeur est : MainController, on instanciera donc la classe MainController

     // Grace à AltoRouter, on peut récupérer le paramètre dans l'url pour l'envoyer en argument de la méthode
     $params = $matchingRoute['params'];

     $controller = new $nomController();
     $controller->$nomMethode($params);
}else 
    {
        // Je n'ai pas trouvé de route qui correspond
        exit('404 not found');
}

