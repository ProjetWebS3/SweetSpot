<?php

class Compte {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitAction($id_compte, $pseudo, $mail, $password, $admin){
        
        $query = $this->db->query("INSERT INTO Compte (id_compte, Pseudo, Email, Password, Admin) VALUES ($id_compte,  $pseudo, $mail, $password, 0);");
        $query->execute();
    }

    public function getCompte($id_recette){
        $query = $this->db->query("SELECT * FROM `Compte` WHERE `id_compte` = $id_compte");
        $recette = $query->fetchAll();
        return $recette;
    }

}
