<?php

final class ControleurCompte
{
    public function defautAction()
    {
        Vue::montrer('gestionCompte/inscription');
    }
    
    public function connexionAction(){
        Vue::montrer('gestionCompte/connexion', array('compte' => $compte));
    }

    public function inscriptionAction(){
        Vue::montrer('gestionCompte/inscription', array('compte' => $compte));
    }
    
    public function inscrireAction()
    {
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Compte($db);
    $compte = $model->submitAction($_GET['pseudo'], $_GET['email'], $_GET['password'], 0);
    Vue::montrer('gestionCompte/Inscription', array('Inscription' => $compte));
    }

    public function connecterAction(){
        var_dump($_GET['pseudo'], $_GET['email'], $_GET['password']);
        die();
    }

}
?>