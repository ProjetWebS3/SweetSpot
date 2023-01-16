<?php
final class ControleurRecette
{
    public function showAction($params) {
      $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
      $model = new Recette($db);
      $recette = $model->getRecette($params[0]);
      Vue::montrer('recette/pageRecette', array('recette' => $recette));
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
      
}
?>