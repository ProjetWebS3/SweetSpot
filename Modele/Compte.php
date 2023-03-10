<?php

class Compte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function submitAction($pseudo, $mail, $password, $admin){

        if($pseudo == NULL || $mail == NULL || $password == NULL){
            $_SESSION['error_message'] = "Veuillez remplir tous les champs";
            return;
        }

        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE Email = ?");
        $stmt->execute(array($mail));
        $result = $stmt->fetchAll();

        if(count($result) > 0) {    
            $_SESSION['error_message'] = "L'adresse mail existe déja";
            return; 
        } else {    
            $token = bin2hex(random_bytes(32));
            $password = password_hash(strval($password), PASSWORD_BCRYPT, ['cost' => 12]);
            
            $query = $this->db->prepare("INSERT INTO Compte (id_compte, pseudo, email, password, admin, token, date_creation, date_connexion) VALUES (:id_compte, :pseudo, :email, :password, :admin, :token, :date_creation, :date_connexion);");
            $query->bindValue(':id_compte', '', PDO::PARAM_INT);
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->bindValue(':email', $mail, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->bindValue(':admin', $admin, PDO::PARAM_BOOL);
            $query->bindValue(':token', $token, PDO::PARAM_STR);
            $query->bindValue(':date_creation', date("Y-m-d H:i:s"), PDO::PARAM_STR);
            $query->bindValue(':date_connexion', date("Y-m-d H:i:s"), PDO::PARAM_STR);
            $query->execute();
            $_SESSION['token'] = $token;
            $_SESSION['pseudo'] = $pseudo;
        }
    }

    public function getCompteAction($mail, $password){

        $dateConnexion = date("Y-m-d H:i:s");

        $stmt2 = $this->db->prepare("UPDATE Compte SET date_connexion = ?  WHERE email=?");
        $stmt2->execute(array($dateConnexion,$mail));

        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE Email = ?");
        $stmt->execute(array($mail));
        $result = $stmt->fetchAll();
        if (password_verify($password, $result[0]["password"]) && $password != ""){
            $_SESSION['token'] = $result[0]['token'];
            $_SESSION['pseudo'] = $result[0]['pseudo'];
            $_SESSION['error_message'] = "";
        } else {
            $_SESSION['error_message'] = "Mauvais mot de passe ou pseudo";
        }

    }

    public function isAdmin() {
        if (!isset($_SESSION['token'])) {
            return false;
        }
        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE token = ?");
        $stmt->execute(array($_SESSION['token']));
        $result = $stmt->fetchAll();
        if ($result[0]["admin"] == 1 && $result[0]["pseudo"] == $_SESSION["pseudo"]) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAccountWithComments($id) {
        $stmt = $this->db->prepare("DELETE FROM Commentaire WHERE id_compte = ?");
        $stmt->execute(array($id));
        $stmt = $this->db->prepare("DELETE FROM Compte WHERE id_compte = ?");
        $stmt->execute(array($id));
    }

    public function mailExist($mail) {
        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE Email = ?");
        $stmt->execute(array($mail));
        $result = $stmt->fetchAll();
        if(count($result) <= 0){
            $_SESSION['error_message'] = "L'adresse mail n'existe pas";
            return false;
        }
        else {
            return true;
        }
    }

    public function updateEmail($mail, $password){
        $stmt = $this->db->prepare("UPDATE Compte SET password = ?  WHERE email = ?");
        $stmt->execute(array(password_hash(strval($password), PASSWORD_BCRYPT, ['cost' => 12]), $mail));

        $stmt2 = $this->db->prepare("SELECT * FROM Compte WHERE Email = ?");
        $stmt2->execute(array($mail));
        $result = $stmt->fetchAll();
        $_SESSION['token'] = $result[0]["token"];
        $_SESSION['pseudo'] = $result[0]["pseudo"];
    }

    public function desactiverCompte($id) {
        $stmt = $this->db->prepare("UPDATE Compte SET shadow = 1  WHERE id_compte = ?");
        $stmt->execute(array($id));
    }

    public function activerCompte($id) {
        $stmt = $this->db->prepare("UPDATE Compte SET shadow = 0  WHERE id_compte = ?");
        $stmt->execute(array($id));
    }

}
