<?php

class CatalogController
{
    public function dysplayCategory()
    {
        $this->show('products_list');
    }

    public function dysplayProduct($params)
    {
        // dump($params['id']);
        $this->show('product');
    }

    public function show($templateName, $viewData = [])
    {   $absoluteURL = $_SERVER['BASE_URI'];
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $templateName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}