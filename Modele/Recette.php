<?php

class Recette {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRecettes() {
        $query = $this->db->query("SELECT `titre`,`image`,`note` FROM `Recette` ORDER BY RAND() LIMIT 3");
        $recette = $query->fetchAll();
        return $recette;
    }
    
}
