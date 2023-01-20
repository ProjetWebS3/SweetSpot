<!DOCTYPE html>
<html lang="fr">
    <head>
        <link href="style.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body>
      <h1 class="text-center text-6xl mt-6"><?= $A_vue['recette'][0]['titre'] ?></h1>
      <div class="flex flex-col lg:flex-row m-8">
        <img class="lg:w-3/5 rounded-3xl" src="data:image/png;base64,<?= base64_encode($A_vue['recette'][0]['image']) ?>" alt="<?= $A_vue['recette'][0]['titre'] ?>">
        <div class="border-4 border-black my-12 lg:my-0 lg:mx-12 rounded-3xl"></div>
        <div class="sm:text-2xl text-base">
          <p1>Cout : </p1><?= $A_vue['categories'][2]['nom'] ?></br></br>
          <p1>Temps de préparation : </p1><?= $A_vue['categories'][1]['nom'] ?></br></br>
          <p1>Dificultée : </p1><?= $A_vue['categories'][0]['nom'] ?></br></br>
          <p1>Note Globale : </p1><p1 class="text-yellow-400"><?= rating_stars($A_vue['recette'][0]['note']) ?></p1>
        </div>
      </div>
      <div class="flex flex-col lg:flex-row">
        <div class="bg-yellow-100 rounded-3xl p-10 m-10 lg:w-2/3 w-auto">
          <p1>
              <?= $A_vue['recette'][0]['ingredient'] ?>
          </p1>
        </div>
        <div class="bg-yellow-100 rounded-3xl p-10 m-10">
          <h1 class="text-center">Préparation</h1>
          <p class="text-base-200 text-black"><?= $A_vue['recette'][0]['description'] ?></p>
        </div>
      </div>
      <div class="border-4 border-black my-12 mx-12 rounded-3xl"></div>
    </body>
</html>

<br>
<?php 
/*if ($_SESSION['pseudo'] != NULL) {
  echo "<li><a href= /compte/deconnexion> Logout </a></li>";
}*/
?>
<p ><?= $A_vue['commentaire'][0]['commentaire'] ?>  </p>




<form action="/Recette/commenter/<?= $A_vue['recette'][0]['id_recette'] ?>" method=get>
    <input type="text" id="commentaire" name="commentaire" placeholder="Commentaire" class="input w-full max-w-xs"><br><br>
    <input type="submit" value="Envoyer" style="border: 1px solid black;" class="btn btn-outline">
</form>
