<?php

final class ControleurDefaut
{
    public function defautAction()
    {   
        $db = new PDO("mysql:host=localhost;dbname=test", "root","root");
        $model = new Recette($db);
        $recette = $model->getRecettes();
        Vue::montrer('accueil/introduction', array('recette' => $recette));
    }
}