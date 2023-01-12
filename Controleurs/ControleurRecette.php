<?php
final class ControleurRecette
{
    public function showAction($params) {
      $db = new PDO("mysql:host=localhost;dbname=test", "root","root");
      $model = new Recette($db);
      $recette = $model->getRecette($params[0]);
      Vue::montrer('recette/pageRecette', array('recette' => $recette));
    }
}
?>
