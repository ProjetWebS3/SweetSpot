<?php
class Categorie
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM TypeCategorie";
        $requete = $this->db->prepare($sql);
        $requete->execute();
        return $requete->fetchAll();
    }

    public function searchByCategory($nomCategorie) {
        $sql = "SELECT DISTINCT * FROM Recette,RecetteCategorie WHERE RecetteCategorie.id_recette=Recette.id_recette AND RecetteCategorie.id_type=:nomCategorie";
        $requete = $this->db->prepare($sql);
        $requete->bindParam(':nomCategorie', $nomCategorie);
        $requete->execute();
        return $requete->fetchAll();
    }

    public function insertCategorie($id_recette, $id_type) {
        $sql = "INSERT INTO RecetteCategorie (id_recette, id_type) VALUES (:id_recette, :id_type)";
        $requete = $this->db->prepare($sql);
        $requete->bindParam(':id_recette', $id_recette);
        $requete->bindParam(':id_type', $id_type);
        $requete->execute();
    }

    public function alterCategorie($id_recette, $id_type, $min, $max) {
        $sql = "UPDATE RecetteCategorie SET id_type=:id_type WHERE id_recette=:id_recette AND id_type BETWEEN :min AND :max;";
        $requete = $this->db->prepare($sql);
        $requete->bindParam(':id_recette', $id_recette);
        $requete->bindParam(':id_type', $id_type);
        $requete->bindParam(':min', $min);
        $requete->bindParam(':max', $max);
        $requete->execute();
    }

    public function getCategoriesByRecipeId($id_recette) {
        $sql = "SELECT * FROM RecetteCategorie WHERE id_recette=:id_recette ORDER BY id_type";
        $requete = $this->db->prepare($sql);
        $requete->bindParam(':id_recette', $id_recette);
        $requete->execute();
        return $requete->fetchAll();
    }

    public function searchCategoryNameByRecipe($id_recette) {
        $sql = "SELECT nom,type FROM RecetteCategorie, TypeCategorie WHERE RecetteCategorie.id_type=TypeCategorie.id_type AND RecetteCategorie.id_recette=:id_recette ORDER BY type";
        $requete = $this->db->prepare($sql);
        $requete->bindParam(':id_recette', $id_recette);
        $requete->execute();
        return $requete->fetchAll();
    }

}