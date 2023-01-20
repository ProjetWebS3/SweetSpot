<?php
session_start();

final class ControleurCompte
{
    public function defautAction()
    {
        Vue::montrer('gestionCompte/inscription');
    }

    public function connexionAction(){
        Vue::montrer('gestionCompte/connexion');
    }

    public function deconnexionAction(){
        /*var_dump("Vous êtes déconnecté");
        die();*/
        $_SESSION["pseudo"] = NULL;
        $_SESSION["token"] = NULL;
        header("Location: /");
        /*?> <a  href="/" > </a>
        <?php*/
    }
    public function inscriptionAction(){
        Vue::montrer('gestionCompte/inscription');
    }
    
    public function inscrireAction()
    {
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Compte($db);
    $model->submitAction($_GET['pseudo'], $_GET['email'], $_GET['password'], 0);
    header("Location: /");     
    }

    public function connecterAction(){
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Compte($db);
        $model->getCompteAction($_GET['email'], $_GET['password']);
        header("Location: /");     
        /*if ( $_SESSION['token'] == true) {
            //var_dump("Bonjour, ", $_SESSION['login']['Pseudo']);
        } else {
            //var_dump("Vous n'êtes pas connecté");
        }*/
    }

}
?>