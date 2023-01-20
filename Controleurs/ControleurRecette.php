<?php
final class ControleurRecette
{
    public function showAction($params) {
      require_once("Modele/helpers.php");
      $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
      $model = new Recette($db);
      $catModel = new Categorie($db);
      $catDeLaRecette = $catModel->searchCategoryNameByRecipe($params[0]);
      $recette = $model->getRecette($params[0]);
      $commentaire = $model->getCommentaire($params[0]);
      Vue::montrer('recette/pageRecette', array('recette' => $recette, 'categories' => $catDeLaRecette, 'commentaire' => $commentaire));
    }

  public function searchAction()
  {
    require_once("Modele/helpers.php");
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Recette($db);
    $recettes = $model->searchRecette($_GET['search']);
    Vue::montrer('recette/pageSearchResult', array('recettes' => $recettes));
  }

  public function searchByCategoryAction($params)
  {
    require_once("Modele/helpers.php");
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Categorie($db);
    $recettes = $model->searchByCategory($params[0]);
    Vue::montrer('recette/pageSearchResult', array('recettes' => $recettes));
  }
      
  public function commenterAction($params){
    if($_SESSION['login'] == NULL){
      //var_dump("Vous n'etes pas connecter");
    } else{
      $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
      $model = new Recette($db);
      $model->commenter($_GET['commentaire'], $params[0]);
      header("Location: /Recette/show/$params[0]");
    }
  }
}
?>