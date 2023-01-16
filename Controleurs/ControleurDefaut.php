<?php

final class ControleurDefaut
{
    
    public function defautAction()
    {   
        require_once("Modele/helpers.php");
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Recette($db);
        $recette = $model->get3Recettes();
        Vue::montrer('accueil/introduction', array('recette' => $recette));
        
    }

    
}
?>