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

}