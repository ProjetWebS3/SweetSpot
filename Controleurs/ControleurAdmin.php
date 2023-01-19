<?php
final class ControleurAdmin
{

    public function defautAction()
    {
        Vue::montrer('admin/addRecip');
    }


    public function addRecipeAction() {
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Recette($db);
        $model-> addRecipeWithCat($_POST['titre'],$_FILES['image'], $_POST['description'], $_POST['ingredient'], $_POST['recipeDuration'], $_POST['recipePrice'], $_POST['recipeDifficulty']);
        Vue::montrer('admin/addRecip');
    }
}