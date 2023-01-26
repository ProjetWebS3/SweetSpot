<?php
final class ControleurRecette
{
    public function showAction($params) {
      require_once("Modele/helpers.php");
      $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
      $model = new Commentaire($db);
      $recetteModel = new Recette($db);
      $admin = new Compte($db);
      $catModel = new Categorie($db);
      $catDeLaRecette = $catModel->searchCategoryNameByRecipe($params[0]);

      $recette = $recetteModel->getRecette($params[0]);
      
      $commentaire = $model->getCommentaire($params[0]);

      $isAdmin = $admin->isAdmin();

      $aCommenté = array();

      for ($i = 0 ; $i < count($commentaire); $i++) {
        $tmp = $model -> aCommenté($commentaire[$i]['id_compte'], $commentaire[$i]['id_commentaire']);
        array_push($aCommenté, $tmp);
      }
      Vue::montrer('recette/pageRecette', array('recette' => $recette, 'categories' => $catDeLaRecette, 'commentaire' => $commentaire, 'aCommenté' => $aCommenté, 'isAdmin' => $isAdmin));
    }

  public function searchAction()
  {

    require_once("Modele/helpers.php");
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Recette($db);
    $admin = new Compte($db);
    $isAdmin = $admin->isAdmin();
    $recettes = $model->searchRecette($_GET['search']);
    Vue::montrer('recette/pageSearchResult', array('recettes' => $recettes, 'isAdmin' => $isAdmin));
  }

  public function searchByCategoryAction($params)
  {
    require_once("Modele/helpers.php");
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Categorie($db);
    $recettes = $model->searchByCategory($params[0]);
    $admin = new Compte($db);
    $isAdmin = $admin->isAdmin();
    Vue::montrer('recette/pageSearchResult', array('recettes' => $recettes, 'isAdmin' => $isAdmin));
  }
      
  public function commenterAction($params){
    if($_SESSION['token'] == NULL){
      echo "<div class=\"alert alert-error shadow-lg\">";
      echo "<div>";
      echo "<span>You need to be connected !</span>";
      echo "</div>";
      echo "</div>";
    } else{
      $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
      $model = new Commentaire($db);
      $model->commenter($_GET['commentaire'], $params[0], $_GET['note']); 
      $_SESSION['scroll_position'] = 0;
      header("Location: /Recette/show/$params[0]");
    }
  }

  public function validerAction($param){
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Commentaire($db);
    $model->validerCommentaire($param[1], $_GET['nouvelCommentaire'], $_GET['noteModifier']);
    $_SESSION['modifier'] = -1;
    $_SESSION['scroll_position'] = $_SERVER['HTTP_USER_AGENT'];
    header("Location: /Recette/show/$param[0]");
  }

  public function modifierAction($param){
    //param -> id_commentaire
    $_SESSION['scroll_position'] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION['modifier'] = $param[1];
    header("Location: /Recette/show/$param[0]");
  }

  public function supprimerCommentaireAction($param) {
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Commentaire($db);
    $model->supprimerCommentaire($param[1]);
    $_SESSION['scroll_position'] = $_SERVER['HTTP_USER_AGENT'];
    header("Location: /Recette/show/$param[0]");
  }

  public function desactiverCommentaireAction($param) {
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Commentaire($db);
    $model->desactiverCommentaire($param[1]);
    header("Location: /Recette/show/$param[0]");
  }

  public function activerCommentaireAction($param) {
    $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
    $model = new Commentaire($db);
    $model->activerCommentaire($param[1]);
    header("Location: /Recette/show/$param[0]");
  }
  
}
?>