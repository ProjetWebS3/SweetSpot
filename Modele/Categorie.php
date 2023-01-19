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

    public function searchCategoryNameByRecipe($id_recette) {
        $sql = "SELECT nom,type FROM RecetteCategorie, TypeCategorie WHERE RecetteCategorie.id_type=TypeCategorie.id_type AND RecetteCategorie.id_recette=:id_recette ORDER BY type";
        $requete = $this->db->prepare($sql);
        $requete->bindParam(':id_recette', $id_recette);
        $requete->execute();
        return $requete->fetchAll();
    }

}