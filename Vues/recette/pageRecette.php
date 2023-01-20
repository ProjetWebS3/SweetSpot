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

<br>

<form>
  <div class="bg-white p-4 rounded-lg shadow-md">
    <div class="text-center mb-4">
      <label class="text-gray-700 font-medium">
        Review by <span class="text-indigo-600 font-medium">User Name</span>
      </label>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-medium mb-2" for="review">
        Review
      </label>
      <textarea
        class="bg-gray-200 p-2 rounded-lg w-full"
        id="review"
        name="review"
        required
      ></textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-medium mb-2">
        Rating
      </label>
      
      </div>
    </div>
    <div class="text-center mt-4">
      <button class="bg-pink-50 text-gray-500 py-2 px-4 rounded-lg hover:bg-indigo-500">
        Submit Review
      </button>
    </div>
  </div>
</form>

<br>

<?php
for ($i = 0; $i < count($A_vue['commentaire']); $i++) {
?>
  <div class="bg-pink-50 p-4 rounded-lg">
    <div class="flex items-center mb-4">
      <img src="/img/photoProfil.png" alt="Roger Dauber" class="w-12 h-12 rounded-full">
      <div class="ml-4">
        <h3 class="text-lg font-medium"><?= $A_vue['commentaire'][$i]['pseudo'] ?></h3>
        <div class="flex items-center">
          <p class="text-yellow-400 ml-2">5.0</p>
        </div>
      </div>
    </div>
    <p class="text-gray-600"><?= $A_vue['commentaire'][$i]['commentaire'] ?></p>
  </div>
  <br>
<?php
}
var_dump($_SESSION);
?>


<form action="/Recette/commenter/<?= $A_vue['recette'][0]['id_recette'] ?>" method=get>
    <input type="text" id="commentaire" name="commentaire" placeholder="Commentaire" class="input w-full max-w-xs"><br><br>
    <input type="submit" value="Envoyer" style="border: 1px solid black;" class="btn btn-outline">
</form>
