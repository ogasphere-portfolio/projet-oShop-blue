<?php

namespace App\Controllers;

class NavController {

    private static $menuItem = ['home', 'category', 'types de produit', 'marques', 'blog','contact'];
    //private static $menuItem = $menuList;
    //private static $menuList;
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
            $absoluteURL = $_SERVER['BASE_URI'];
            echo '<li class="nav-item ' . $class . ' px-lg-4">';
            echo '<a class="nav-link text-uppercase text-expanded" href="'. $absoluteURL .'index.php?page='. lcfirst($item) .'">' . $item . ' <span class="sr-only">(current)</span>
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