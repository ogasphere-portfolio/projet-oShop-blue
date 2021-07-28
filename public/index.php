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
require __DIR__.'/Autoloader.php';
require __DIR__.'/../app/Class/db.php';
require __DIR__.'/../app/Controllers/MainController.php';
require __DIR__.'/../app/Controllers/NavController.php';

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

/**********************************
//?    associer l'URL avec la méthode du controller correspondant
//?    On appelle ça faire des "routes" ou routing 
**********************************/
$routes = [
    "/home" => [
        "method" => "affichePageHome"
    ],
    "/about" => [
        "method" => "affichePageAbout"
    ]
];
/* DEBUG
echo "routes : <br>";
var_dump($routes);
*/

$controller = new MainController();

/********** Dispatcher ************/

//? je récupère les informations de route
$informationRoute = $routes[$currentPage];
//Debug
echo "informationRoute : <br>";
var_dump($informationRoute);
//["method" => "affichePageHome" ]


//? je récupère le nom de la méthode associé à ma route
$nomMethode = $informationRoute['method'];
/* DEBUG
echo "nomMethode : <br>";
var_dump($nomMethode);
*/

// $nomMethode ==> affichePageHome
// je lance la méthode en n'oubliant pas les ()
$controller->affichePageHome();

