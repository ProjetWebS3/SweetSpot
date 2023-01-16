<?php

final class ControleurCompte
{
    public function defautAction()
    {
        Vue::montrer('gestionCompte/compte');
    }

    /*public function showAction($params) {
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Compte($db);
        $compte = $model->getCompte($params[0]);
        Vue::montrer('gestionCompte/compte', array('compte' => $compte));
    }*/
    
    public function showAction()
    {
    require_once("Modele/helpers.php");
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Compte($db);
    $compte = $model->getCompte($_GET['show']);
    Vue::montrer('gestionCompte/compte', array('compte' => $compte));
    }

}
?>