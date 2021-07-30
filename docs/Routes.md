# Routes
Voici la liste des pages et leur URL (avec parfois des "ID" pouvant changer) :

accueil : /
mentions légales : /mentions-legales/
catégorie #12 : /catalogue/categorie/12
type #40 : /catalogue/type/40
marque #2 : /catalogue/marque/2
produit #4 : /catalogue/produit/4

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/public-url/with-sub-folder/[and-dynamic-part]` | `GET` ou `POST` | `ControllerName` | `methodName` | Titre de la page | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |
| `/` | `GET` | `MainController` | `dysplayHome` | Dans les shoe | 5 categories | - |
| `/mentions-legales/` | `GET` | `MainController` | `dysplayLegalNotice` | Legal Notices | Legal Notice | - |
| `/catalogue/categorie/[i:idCategorie]` | `GET` | `CatalogController` | `dysplayCategory` | Category name | list of product filtered by category | idCategory is INTEGER and will filter the product list |
| `/catalogue/type/[i:idType]` | `GET` | `CatalogController` | `dysplayType` | Name of  | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |