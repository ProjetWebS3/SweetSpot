<?php
final class ControleurRecette
{
    public function showAction($params) {
      $db = new PDO("mysql:host=localhost;dbname=test", "root","root");
      $model = new Recette($db);
      $recette = $model->getRecette($params[0]);
      Vue::montrer('recette/pageRecette', array('recette' => $recette));
    }

  public function searchAction()
  {
    require_once("Modele/helpers.php");
    $db = new PDO("mysql:host=localhost;dbname=test", "root", "root");
    $model = new Recette($db);
    $recettes = $model->searchRecette($_GET['search']);
    Vue::montrer('recette/pageSearchResult', array('recettes' => $recettes));
  }
      
}
?>