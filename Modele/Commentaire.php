<?php

class Commentaire
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCommentaire($params){
        $stmt = $this->db->prepare("SELECT DISTINCT Compte.pseudo, Compte.date_creation, Compte.shadow AS compteShadow, Compte.date_connexion, Commentaire.* FROM Commentaire,Compte WHERE Commentaire.id_compte=Compte.id_compte AND Commentaire.id_recette = ?");
        $stmt->execute(array($params));
        $commentaire = $stmt->fetchAll();
        return $commentaire;
    }

    public function commenter($commentaire, $id_recette, $note){

        $truc = $_SESSION['token'];
        $query2 = $this->db->prepare("SELECT * FROM `Compte` WHERE `token` = :token");
        $query2->execute(array(':token' => $truc));
        $id_compte = $query2->fetchAll();

        $query = $this->db->prepare("INSERT INTO Commentaire (id_commentaire, id_compte, id_recette, commentaire, note, date) VALUES (:id_commentaire, :id_compte, :id_recette, :commentaire, :note, :date);");
        $query->bindValue(':id_commentaire', '', PDO::PARAM_INT);
        $query->bindValue(':id_compte', $id_compte[0]["id_compte"], PDO::PARAM_STR);
        $query->bindValue(':id_recette', $id_recette, PDO::PARAM_STR);
        $query->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        $query->bindValue(':note', $note, PDO::PARAM_STR);
        $query->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);
        $query->execute();

    }

    public function aCommenté($id_compte, $id_commentaire){

        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE token = ?");
        $stmt->execute(array($_SESSION['token']));
        $resultat = $stmt->fetchAll();
        if($resultat[0]['id_compte'] == $id_compte){

            return $id_commentaire;
        }
        else {
            return -1;
        }
        
    }

    public function supprimerCommentaire($id_commentaire){
        $stmt = $this->db->prepare("DELETE FROM Commentaire WHERE id_commentaire = ?");
        $stmt->execute(array($id_commentaire));
    }

    public function desactiverCommentaire($id_commentaire){
        $stmt = $this->db->prepare("UPDATE Commentaire SET shadow = 1 WHERE id_commentaire = ?");
        $stmt->execute(array($id_commentaire));
    }

    public function activerCommentaire($id_commentaire){
        $stmt = $this->db->prepare("UPDATE Commentaire SET shadow = 0 WHERE id_commentaire = ?");
        $stmt->execute(array($id_commentaire));
    }

    public function validerCommentaire($id_compte, $commentaire, $note){

        $stmt = $this->db->prepare("UPDATE Commentaire SET commentaire = ?, note = ?  WHERE id_commentaire=?");
        $stmt->execute(array($commentaire,$note, $id_compte));
    }

} ?>