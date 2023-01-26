<?php
session_start();

final class ControleurCompte
{
    public function defautAction()
    {
        $_SESSION['error_message'] = "";
        Vue::montrer('gestionCompte/inscription');
    }

    public function connexionAction(){
        $_SESSION['error_message'] = "";
        Vue::montrer('gestionCompte/connexion');
    }

    public function deconnexionAction(){
        $_SESSION['error_message'] = "";
        $_SESSION["pseudo"] = NULL;
        $_SESSION["token"] = NULL;
        header("Location: /");
    }
    public function inscriptionAction(){
        $_SESSION['error_message'] = "";
        Vue::montrer('gestionCompte/inscription');
    }
    
    public function inscrireAction()
    {
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Compte($db);
    $model->submitAction($_GET['pseudo'], $_GET['email'], $_GET['password'], 0);
    if($_SESSION['error_message'] != ""){
        Vue::montrer('gestionCompte/inscription');
    }else{
        header("Location: /");     
    }
    }

    public function connecterAction(){
        if($_GET['email'] == NULL || $_GET['password'] == NULL){
            $_SESSION['error_message'] = "Veuillez remplir tous les champs";
            Vue::montrer('gestionCompte/connexion');
            return;
        }
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Compte($db);
        $model->getCompteAction($_GET['email'], $_GET['password']);
        if($_SESSION['token'] == true){
            header("Location: /");
        } else {
            Vue::montrer('gestionCompte/connexion');
        }
    }

    public function supprimerCompteAction($param){
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Compte($db);
        $model->deleteAccountWithComments($param[1]);
        header("Location: /Recette/show/$param[0]");
      }

}
?>