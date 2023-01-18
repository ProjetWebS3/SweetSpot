<?php

class Compte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitAction($pseudo, $mail, $password, $admin){

        $query = $this->db->query("SELECT * FROM Compte WHERE Email = '$mail'");
        $result = $query->fetchAll();

        if(count($result) > 0) {           
            var_dump("L'adresse mail existe déja");   
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
        }
    }

    public function getCompteAction($mail, $password){
        $query = $this->db->query("SELECT * FROM Compte WHERE Email = '$mail'");
        $result = $query->fetchAll();
        if ($result[0]["Password"] == $password) {
            $_SESSION['token'] = $result[0]['token'];
        }
    }

}
