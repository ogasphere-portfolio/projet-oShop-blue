<?php


class NavController {

    private static $menuItem = ['home', 'categories', 'types de produit', 'marques', 'blog','contact'];

    public static function showNavBar(){
        foreach (self::$menuItem as $item) {
            $class = '';
            $currentItem = lcfirst($item);
            if (isset($_GET['page'])) { 
              if(htmlentities(trim($_GET['page'])) == $currentItem) {
                $class = 'active';
              } 
            }

        if($_SERVER['QUERY_STRING'] == '' && $currentItem == 'home') {
          $class = 'active';
        }
            echo '<li class="nav-item ' . $class . ' px-lg-4">';
            echo '<a class="nav-link text-uppercase text-expanded" href="index.php?page='. lcfirst($item) .'">' . $item . ' <span class="sr-only">(current)</span>
          </a>';
            echo '</li>';
        }
    }
}

           /*  '<li class="nav-item ". $class .""">
              '<a href="index.html" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Catégories</a>
            </li> */