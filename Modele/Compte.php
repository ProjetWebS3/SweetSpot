<?php

class Compte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitAction($id_compte, $pseudo, $mail, $password, $admin){
        $query = $this->db->prepare("INSERT INTO Compte (id_compte, Pseudo, Email, Password, Admin) VALUES (:id_compte, :pseudo, :email, :password, :admin);");
        $query->bindValue(':id_compte', $id_compte, PDO::PARAM_INT);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':email', $mail, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':admin', $admin, PDO::PARAM_BOOL);
        $query->execute();
    }

    public function getCompte($id_compte){
        $query = $this->db->query("SELECT * FROM `Compte` WHERE `id_compte` = $id_compte");
        $recette = $query->fetchAll();
        return $recette;
    }

}
