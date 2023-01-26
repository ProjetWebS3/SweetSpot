<?php

$scroll_position = $_SESSION['scroll_position'];
echo "<script>window.scrollTo(0, $scroll_position);</script>";

?>

<h1 class="text-center text-6xl mt-6"><?= $A_vue['recette'][0]['titre'] ?></h1>
<div class="flex flex-col lg:flex-row m-8">
  <img class="lg:w-3/5 rounded-3xl" src="data:image/png;base64,<?= base64_encode($A_vue['recette'][0]['image']) ?>" alt="<?= $A_vue['recette'][0]['titre'] ?>">
  <div class="border-2 border-black my-12 lg:my-0 lg:mx-12 rounded-3xl"></div>
  <div class="sm:text-2xl text-base">
    <p1>Coût : </p1><?= $A_vue['categories'][2]['nom'] ?></br></br>
    <p1>Temps de préparation : </p1><?= $A_vue['categories'][1]['nom'] ?></br></br>
    <p1>Difficultée : </p1><?= $A_vue['categories'][0]['nom'] ?></br></br>
    <p1>Note Globale : </p1><p1 class="text-yellow-400"><?= rating_stars($A_vue['recette'][0]['note']) ?></p1>
  </div>
</div>
<div  class="flex flex-col lg:flex-row">
  <div data-theme="mytheme" class="bg-base-100 rounded-3xl p-10 m-10 lg:w-2/3 w-auto">
    <p1>
        <?= $A_vue['recette'][0]['ingredient'] ?>
    </p1>
  </div>
  <div data-theme="mytheme" class="bg-base-100 rounded-3xl p-10 m-10">
    <h1 class="text-center">Préparation</h1>
    <p class="text-base-200 text-black"><?= $A_vue['recette'][0]['description'] ?></p>
  </div>
</div>
<div class="border-2 border-black my-12 mx-12 rounded-3xl"></div>

<br>

<div class="w-full flex justify-center">
  <form class="w-1/2 " action="/Recette/commenter/<?= $A_vue['recette'][0]['id_recette'] ?>" method=get>
    <div data-theme="mytheme" class="bg-base-100 p-4 rounded-lg shadow-md">
      <div class="text-center mb-4">
        <label class="text-gray-700 font-medium">
          Donnez votre avis!
        </label>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="review">
          Avis
        </label>
        <textarea
          class="bg-white p-2 rounded-lg w-full"
          id="review"
          name="commentaire" 
          required
        ></textarea>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2">
          Note
        </label>
        <input type="range" name="note" min="1" max="5" value="3" class="range range-accent" step="0.5" />
        <div class="w-full flex justify-between text-xs px-2 bg-red">
          <span>1</span>
          <span>|</span>
          <span>2</span>
          <span>|</span>
          <span>3</span>
          <span>|</span>
          <span>4</span>
          <span>|</span>
          <span>5</span>
        </div>
        </div>
        <div class="flex justify-center pt-8">
        <button class="bg-white text-gray-500 py-2 px-4 rounded-lg hover:bg-gray-200" type="submit">
          Poster
        </button>
        </div>
      </div>
    </div>
  </form>
</div>

<br>


<?php
for ($i = count($A_vue['commentaire']) -1 ; $i >= 0; $i--) {
?>

<div id="popup<?=$i?>" class="popup ml-auto mr-auto flex w-1/2 flex-col rounded-2xl bg-pink-50 text-xs md:text-base">
  <div class="flex flex-row justify-between">
    <div class="flex flex-row">
      <img src="/img/photoProfil.png" alt="Roger Dauber" class="m-3 h-12 w-12 rounded-full" />
      <p1 class="mt-auto mb-auto ml-5"><?= $A_vue['commentaire'][$i]['pseudo'] ?></p1>
    </div>
    <i id="close<?=$i?>" class="text-red-500 fa-solid fa-circle-xmark mt-auto mb-auto mr-5 pl-5 md:pl-0 fa-xl"></i>
  </div>
  <p1 class="pl-5 md:ml-5 md:pl-0">Création du compte : 01/01/0000</p1><br>
  <p1 class="pl-5 md:pl-0 md:ml-5">Dernière connexion : 01/01/0000</p1>
  <div class="m-5 flex flex-row justify-between">
    <p1>Nombre de commentaires : 6</p1>
    <div><i class="fa-solid fa-ghost fa-xl pr-2"></i><i class="fa-solid fa-gavel fa-xl"></i></div>
  </div>
</div>


  <div class="bg-pink-50 p-4 rounded-lg">
    <div class="flex items-center mb-4">
      <img src="/img/photoProfil.png" alt="Roger Dauber" id="imgButton<?=$i?>" class="w-12 h-12 rounded-full">
      <div class="ml-4">
        <h3 class="text-lg font-medium"><?= $A_vue['commentaire'][$i]['pseudo'] ?></h3>
        <div class="flex items-center">
          <p class="text-yellow-400 ml-2"><?= rating_stars($A_vue['commentaire'][$i]['note']) ?></p>
        </div>
        <p class="text-gray-600" >  A commenté le  <?= $A_vue['commentaire'][$i]['date'] ?> </p>
      </div>
    </div>


    <?php 
    //Si l'utilisateur a déjà commenté la recette
    if( $A_vue['aCommenté'][$i] == $A_vue['commentaire'][$i]['id_commentaire'] ){
        //Si l'utilisateur a cliqué sur le bouton modifier
        if ( $_SESSION['modifier'] == $A_vue['commentaire'][$i]['id_commentaire']){
    ?>
          <form class="w-1/2 " action="/Recette/valider/<?= $A_vue['recette'][0]['id_recette'] ?>/<?= $A_vue['commentaire'][$i]["id_commentaire"]?>" method=get>
          <input type="text" value=<?= $A_vue['commentaire'][$i]["commentaire"]?> name="nouvelCommentaire" id="nouvelCommentaire" class="bg-pink-50 border-2 border-red-600">
          <br>
          <button class="bg-white text-gray-500 py-8 px-4 rounded-lg hover:bg-gray-200"> Valider </button>
          </form>
      <?php 
      } else {
      ?>   
      
      <p class="text-gray-600"><?= $A_vue['commentaire'][$i]['commentaire'] ?></p>       
      <form class="w-1/2 " action="/Recette/modifier/<?= $A_vue['recette'][0]['id_recette'] ?>/<?= $A_vue['commentaire'][$i]["id_commentaire"]?>" method=get>
      <button class="bg-white text-gray-500 py-8 px-4 rounded-lg hover:bg-gray-200"> Modifier </button>
      </form>
      <?php  
      } 
    }?>


  </div>
  <br>
<script>
  document.getElementById("imgButton<?=$i?>").addEventListener("click", function(){
    console.log("click");
    document.getElementById("popup<?=$i?>").style.display = "block";
  });

  document.getElementById("close<?=$i?>").addEventListener("click", function(){
    document.getElementById("popup<?=$i?>").style.display = "none";
  });
</script>
<?php
}
?>

