<h1 class="text-center text-6xl mt-6"><?= $A_vue['recette'][0]['titre'] ?></h1>
<div class="flex flex-col lg:flex-row m-8">
  <img class="lg:w-3/5 rounded-3xl" src="data:image/png;base64,<?= base64_encode($A_vue['recette'][0]['image']) ?>" alt="<?= $A_vue['recette'][0]['titre'] ?>">
  <div class="border-2 border-black my-12 lg:my-0 lg:mx-12 rounded-3xl"></div>
  <div class="sm:text-2xl text-base">
    <p1>Cout : </p1><?= $A_vue['categories'][2]['nom'] ?></br></br>
    <p1>Temps de préparation : </p1><?= $A_vue['categories'][1]['nom'] ?></br></br>
    <p1>Dificultée : </p1><?= $A_vue['categories'][0]['nom'] ?></br></br>
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
<form class="w-1/2 " action="/Recette/modifier/<?= $A_vue['recette'][0]['id_recette'] ?>/<?= $A_vue['commentaire'][$i]["id_commentaire"] ?>" method=get>
<input type="text" name="nouvelCommentaire" id="nouvelCommentaire">
<button> Modifier </button>
</form>
  <div class="bg-pink-50 p-4 rounded-lg">
    <div class="flex items-center mb-4">
      <img src="/img/photoProfil.png" alt="Roger Dauber" class="w-12 h-12 rounded-full">
      <div class="ml-4">
        <h3 class="text-lg font-medium"><?= $A_vue['commentaire'][$i]['pseudo'] ?></h3>
        <div class="flex items-center">
          <p class="text-yellow-400 ml-2"><?= rating_stars($A_vue['commentaire'][$i]['note']) ?></p>
        </div>
        <p class="text-gray-600" >  A commenté le  <?= $A_vue['commentaire'][$i]['date'] ?> </p>
      </div>
    </div>
    <p class="text-gray-600"><?= $A_vue['commentaire'][$i]['commentaire'] ?></p>
  </div>
  <br>
<?php
}
?>
