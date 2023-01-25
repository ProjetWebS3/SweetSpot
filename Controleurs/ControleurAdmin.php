<?php
final class ControleurAdmin
{

    public function defautAction()
    {
        Vue::montrer('admin/addRecipe');
    }


    public function addRecipeAction() {
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Recette($db);
        $model-> addRecipeWithCat($_POST['titre'],$_FILES['image'], $_POST['description'], $_POST['ingredient'], $_POST['recipeDuration'], $_POST['recipePrice'], $_POST['recipeDifficulty']);
        Vue::montrer('admin/addRecipe');
    }

    public function modifyRecipePageAction($param) {
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Recette($db);
        $recette = $model->getRecette($param[0]);
        $categorieModel = new Categorie($db);
        $categories = $categorieModel->getCategoriesByRecipeId($param[0]);
        Vue::montrer('admin/alterRecipe', array('recette' => $recette, 'categories' => $categories));
      }
    
      public function alterRecipeAction($param){
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Recette($db);
        //$model->alterRecipe($param[0], $_GET['titre'], $_GET['description'], $_GET['ingredients'], $_GET['preparation']);
        header("Location: /Recette/show/$param[0]");
      }

      public function deleteRecipeAction($param){
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Recette($db);
        $model->deleteRecipe($param[0]);
        header("Location: /");
      }
}