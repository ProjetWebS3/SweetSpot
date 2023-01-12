<?php

class Recette {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get3Recettes() {
        $query = $this->db->query("SELECT `id_recette`,`titre`,`image`,`note` FROM `Recette` ORDER BY RAND() LIMIT 3");
        $recette = $query->fetchAll();
        return $recette;
    }

    public function getRecette($id_recette){
        $query = $this->db->query("SELECT * FROM `Recette` WHERE `id_recette` = $id_recette");
        $recette = $query->fetchAll();
        return $recette;
    }

    public function searchRecette($search){
        $query = $this->db->query("SELECT * FROM `Recette` WHERE `titre` LIKE '%$search%'");
        $recette = $query->fetchAll();
        return $recette;
    }

}
