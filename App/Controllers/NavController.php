<?php

namespace App\Controllers;

use App\Models\NavBar;

class NavController {

    
    //private static $menuItem = $menuList;
    //private static $menuList;
    public static function showNavBar(){
      global $altoRouter;
      $NavBar= new NavBar;
      $menuItem = $NavBar::getNavBar();
      
        foreach ($menuItem as $item) {
           
            $class = '';
            $currentItem = lcfirst($item['link']);
            
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
            echo '<a class="nav-link text-uppercase text-expanded" href="'. $altoRouter->generate(lcfirst($item['link']), ['id'=>1]) .'">' . $item['title'] . ' <span class="sr-only">(current)</span>
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