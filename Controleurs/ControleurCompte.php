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

    public function reinitialisationMdpAction(){
        $_SESSION['error_message'] = "";
        Vue::montrer('gestionCompte/changermdp');
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

    public function reinitialiserMdpAction(){
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Compte($db);
        if($_GET['email'] == NULL){
            $_SESSION['error_message'] = "Veuillez remplir tous les champs";
            Vue::montrer('gestionCompte/changermdp');
            return;
        }
        else if($model->mailExist($_GET['email'])){
            $_SESSION['error_message'] = "";
            $_SESSION['email_mdp_oublie'] = $_GET['email'];
            $_SESSION['digit_mdp'] = strval(rand(1000, 9999));
            ini_set('SMTP', 'smtp-sweet-spot.alwaysdata.net');
            ini_set('smtp_port', 25);
            $to = $_GET["email"];
            $subject = '[Sweet Spot] Réinitialisation mot de passe';
            $message = 'Bonjour, voici le code à rentrer pour réinitialiser votre mot de passe: '. $_SESSION['digit_mdp'];
            $headers = array(
            'From' => 'reset-password@sweet-spot.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
        Vue::montrer('gestionCompte/confirmerCodeMdp');
        return;
    }
    else {
        Vue::montrer('gestionCompte/changermdp');
            return;
    }
}

public function verifierCodeMdpAction(){
    if(strcmp($_GET['code'], $_SESSION['digit_mdp']) == 0){
        $_SESSION['error_message'] = "";
        Vue::montrer('gestionCompte/changementMdp');
    }
    else {
        $_SESSION['error_message'] = "Code incorrect";
        Vue::montrer('gestionCompte/confirmerCodeMdp');
    }
}

public function changerMdpAction(){
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Compte($db);
    $model->updateEmail($_SESSION['email_mdp_oublie'], $_GET['password']);
    $_SESSION['email_mdp_oublie'] = "";
        header("Location: /");
}

    public function supprimerCompteAction($param){
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $model = new Compte($db);
        $model->deleteAccountWithComments($param[1]);
        header("Location: /Recette/show/$param[0]");
      }

}
?>