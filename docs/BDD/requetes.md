# SQL

## tout les produits d'une catégorie

category_id 1 fonctionne

```SQL
SELECT * FROM `product` WHERE `category_id` = ?
```

## tout les produits d'une marque

brand_id 7 fonctionne

```SQL
SELECT * FROM `product` WHERE `brand_id` = ?
```

## tout les produits d'un type

type_id 4 fonctionne

```SQL
SELECT * FROM `product` WHERE `type_id` = ?
```

## un produit

id 1 fonctionne

```SQL
SELECT * FROM `product` WHERE `id` = ?
```

## exemple de INNER JOIN

je cherche à récupere tout les produits d'une category
mais je veux aussi le nom de la catégorie auquel ils appartiennent

```SQL
SELECT `product`.* , `category`.`name`
FROM `product`
INNER JOIN `category` ON `product`.`category_id` = `category`.`id`
WHERE `category_id` = 1
```

je cherche à récupere tout les produits (sans filtre)
mais je veux aussi le nom de la catégorie auquel ils appartiennent

```SQL
-- le hic c'est que * dit tout les champs de toutes les tables
-- il faut donc préciser ce que l'on veux comme champs
SELECT product.* , category.name
FROM product 
-- je défini la relation entre mes tables
INNER JOIN category ON product.category_id = category.id
```
