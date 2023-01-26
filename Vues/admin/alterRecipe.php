<h1 class="text-3xl text-center">Modifier une recette :</h1>
<br />
<div class="flex items-center justify-center p-12">
<div class="mx-auto w-full max-w-[550px]">
  <form class="bg-pink-50 p-10 rounded-md" action="/admin/alterRecipe/<?= $A_vue['recette'][0]['id_recette'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-5">
      <label for="name" class="mb-3 block text-base font-medium text-[#07074D]"> Nom de la recette </label>
      <input type="text" name="titre" id="name" value="<?= $A_vue['recette'][0]['titre'] ?>" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
    </div> <br>
    <div class="mb-5">
      <p>Prix :</p>
        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" name="recipePrice" required>
          <option value="9" <?= $A_vue['categories'][2]['id_type'] == 9 ? 'selected' : '' ?>>Peu Cher</option>
          <option value="10" <?= $A_vue['categories'][2]['id_type'] == 10 ? 'selected' : '' ?>>Abordable</option>
          <option value="11" <?= $A_vue['categories'][2]['id_type'] == 11 ? 'selected' : '' ?>>Cher</option>
          <option value="12" <?= $A_vue['categories'][2]['id_type'] == 12 ? 'selected' : '' ?>>Très Cher</option></select>
          <br>
    </div>
    <div class="mb-5">
      <p>Difficulté :</p>
        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" name="recipeDifficulty" required>
            <option value="1" <?= $A_vue['categories'][0]['id_type'] == 1 ? 'selected' : '' ?>>Très facile</option>
          <option value="2" <?= $A_vue['categories'][0]['id_type'] == 2 ? 'selected' : '' ?>>Facile</option>
          <option value="3" <?= $A_vue['categories'][0]['id_type'] == 3 ? 'selected' : '' ?>>Moyen</option>
          <option value="4" <?= $A_vue['categories'][0]['id_type'] == 4 ? 'selected' : '' ?>>Difficile</option>
        </select>
          <br>
    </div>
    <div class="mb-5">
      <p>Durée :</p>
        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" name="recipeDuration" required>
          <option value="5" <?= $A_vue['categories'][1]['id_type'] == 5 ? 'selected' : '' ?>>Rapide</option>
          <option value="6" <?= $A_vue['categories'][1]['id_type'] == 6 ? 'selected' : '' ?>>Normal</option>
          <option value="7" <?= $A_vue['categories'][1]['id_type'] == 7 ? 'selected' : '' ?>>Long</option>
          <option value="8" <?= $A_vue['categories'][1]['id_type'] == 8 ? 'selected' : '' ?>>Très long</option></select>
          <br>
    </div><br><br>
    <div class="mb-5">
      <label for="message" class="mb-3 block text-base font-medium text-[#07074D]"> Préparation </label>
      <textarea rows="4" name="description" id="message" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"> <?= str_replace("<br>","",$A_vue['recette'][0]['description']) ?> </textarea>
    </div>
    <div class="mb-5">
      <label for="message" class="mb-3 block text-base font-medium text-[#07074D]"> Ingrédients </label>
      <textarea rows="4" name="ingredient" id="message" placeholder="1 ère Etape : &#10 ..." class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"> <?= str_replace("<br>","",$A_vue['recette'][0]['ingredient']) ?> </textarea>
    </div>
    <button class="btn bg-gray-400 text-white justify-center"><input type="submit" name="soumission" value="Submit"><br></button> 
  </form>
</div>
</div>