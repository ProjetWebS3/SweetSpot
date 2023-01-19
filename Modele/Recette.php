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
    
    public function commenter($commentaire, $id_recette){   

        $query = $this->db->prepare("INSERT INTO Commentaire (id_commentaire, id_compte, id_recette, commentaire, note) VALUES (:id_commentaire, :id_compte, :id_recette, :commentaire, :note);");
        $query->bindValue(':id_commentaire', '', PDO::PARAM_INT);
        $query->bindValue(':id_compte', $_SESSION['login']['id_compte'], PDO::PARAM_STR);
        $query->bindValue(':id_recette', $id_recette, PDO::PARAM_STR);
        $query->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        $query->bindValue(':note', 0, PDO::PARAM_BOOL);
        $query->execute();

    }

    public function addRecipeWithCat($titre,$image, $description, $ingredient,$recipeDuraction,$recipePrice,$recipeDifficulty){
        $query = $this->db->prepare("INSERT INTO Recette (titre, image, description, ingredient) VALUES (:titre, :image, :description,:ingredient);");
        $description = str_replace("\n", "<br>", $description);
        $ingredient = str_replace("\n", "<br>", $ingredient);
        $imageData = file_get_contents($image['tmp_name']);
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':image', $imageData, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':ingredient', $ingredient, PDO::PARAM_STR);
        $query->execute();
        $lastId = $this->db->lastInsertId();
        $modelCat = new Categorie($this->db);
        $modelCat->insertCategorie($lastId, $recipeDuraction);
        $modelCat->insertCategorie($lastId, $recipePrice);
        $modelCat->insertCategorie($lastId, $recipeDifficulty);

    }

}
