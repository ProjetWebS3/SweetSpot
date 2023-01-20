<?php

class Compte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitAction($pseudo, $mail, $password, $admin){

        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE Email = ?");
        $stmt->execute(array($mail));
        $result = $stmt->fetchAll();

        if(count($result) > 0) {    
            $_SESSION['error_message'] = "L'adresse mail existe déja";   
        } else {    
            $token = bin2hex(random_bytes(32));
            
            $query = $this->db->prepare("INSERT INTO Compte (id_compte, pseudo, email, password, admin, token) VALUES (:id_compte, :pseudo, :email, :password, :admin, :token);");
            $query->bindValue(':id_compte', '', PDO::PARAM_INT);
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->bindValue(':email', $mail, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->bindValue(':admin', $admin, PDO::PARAM_BOOL);
            $query->bindValue(':token', $token, PDO::PARAM_STR);
            $query->execute();
            $_SESSION['token'] = $token;
            $_SESSION['pseudo'] = $pseudo;
        }
    }

    public function getCompteAction($mail, $password){
        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE Email = ?");
        $stmt->execute(array($mail));
        $result = $stmt->fetchAll();
        if ($result[0]["password"] == $password && $password != "") {
            $_SESSION['token'] = $result[0]['token'];
            $_SESSION['pseudo'] = $result[0]['pseudo'];
            $_SESSION['error_message'] = "";
        } else {
            $_SESSION['error_message'] = "Mauvais mot de passe ou pseudo";
        }

    }

}
