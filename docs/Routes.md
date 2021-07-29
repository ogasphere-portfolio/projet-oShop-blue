# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `affichePageHome` | Dans les shoe | 5 categories | - |
|/home|`GET`        | `MainController` | `affichePageHome` | Dans les shoe | 5 categories |
|/mentions-legales/|`GET`|`MainController`|`affichePageMentions`|Mentions légales|--|--|
| `/catalog/category/[i:id]` |`GET`|`CatalogController`|`affichePageCategory`|Catégories|--|--|
|`/catalog/type/[i:id]`|`GET`|`CatalogController`|`affichePageType`|Type|--|--|
|`/catalog/marque/[i:id]`|`GET`|`CatalogController`|`affichePageMarque`|Marque|--|--|

| `/catalog/produit/[i:id]` | `GET` | `CatalogController` | `affichePageProduit` | Dans les shoe | 5 categories | - |
