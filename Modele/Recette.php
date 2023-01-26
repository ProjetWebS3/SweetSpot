<?php

class Recette {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get3Recettes() {
        $stmt = $this->db->prepare("SELECT `id_recette`,`titre`,`image`,`note` FROM `Recette` ORDER BY RAND() LIMIT 3");
        $stmt->execute();
        $recette = $stmt->fetchAll();
        return $recette;
    }

    public function getRecette($id_recette){
        $stmt = $this->db->prepare("SELECT * FROM `Recette` WHERE `id_recette` = ?");
        $stmt->execute(array($id_recette));
        $recette = $stmt->fetchAll();
        return $recette;
    }

    public function searchRecette($search){
        $stmt = $this->db->prepare("SELECT * FROM `Recette` WHERE `titre` LIKE ?");
        $stmt->execute(array("%$search%"));
        $recette = $stmt->fetchAll();
        return $recette;
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

    public function alterRecipeWithCat($id_recette, $titre, $description, $ingredient, $recipeDuraction, $recipePrice,$recipeDifficulty) {
        $query = $this->db->prepare("UPDATE Recette SET titre=:titre, description=:description, ingredient=:ingredient WHERE id_recette=:id_recette;");
        $description = str_replace("\n", "<br>", $description);
        $ingredient = str_replace("\n", "<br>", $ingredient);
        $query->bindValue(':id_recette', $id_recette, PDO::PARAM_INT);
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':ingredient', $ingredient, PDO::PARAM_STR);
        $query->execute();
        $modelCat = new Categorie($this->db);
        $modelCat->alterCategorie($id_recette, $recipeDuraction,5,8);
        $modelCat->alterCategorie($id_recette, $recipePrice,9,12);
        $modelCat->alterCategorie($id_recette, $recipeDifficulty,1,4);
    }

    

    public function deleteRecipe($id_recette){
        $stmt = $this->db->prepare("DELETE FROM RecetteCategorie WHERE id_recette = ?");
        $stmt->execute(array($id_recette));
        $stmt = $this->db->prepare("DELETE FROM Recette WHERE id_recette = ?");
        $stmt->execute(array($id_recette));
    }

    
    


}
