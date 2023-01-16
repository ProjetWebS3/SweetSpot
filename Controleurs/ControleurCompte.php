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
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Compte($db);
    $compte = $model->submitAction(4, $_GET['pseudo'], $_GET['email'], $_GET['password'], 0);
    Vue::montrer('gestionCompte/compte', array('compte' => $compte));
    }

}
?>