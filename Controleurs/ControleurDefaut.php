<?php
final class ControleurDefaut
{
    
    public function defautAction()
    {   
        $_SESSION['error_message'] = "";
        require_once("Modele/helpers.php");
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $recetteModel = new Recette($db);
        $categorieModel = new Categorie($db);
        $recette = $recetteModel->get3Recettes();
        $categorie = $categorieModel->getCategories();
        Vue::montrer('accueil/introduction', array('recette' => $recette, 'categorie' => $categorie));

        
    }

    public function bonjourAction()
    {
        echo ("Bonjour");
        Vue::montrer('accueil/introduction');
    }

    
}
?>