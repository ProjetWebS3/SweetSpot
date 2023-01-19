<div class="createRecipeFlex">
<h1 class="addRecipTitle">Créer une recette :</h1>
<form class="addRecipForm" action="/admin/addRecipe" method="post" enctype="multipart/form-data">
  <div class="input_name">Nom de la recette : </div><input class= "inputRecipeName" type="text" name="titre" required> <br><br>
  <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Recipe Image</label>
  <input class="inputImageRecipe block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="fileInput" type="file" name="image" onchange="checkFile()">
  <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG (doit faire exactement 600x400).</p>
  <div class="input_name">Prix : </div>
  <select class= "catChoice" name="recipePrice" required>
      <option value="9">Peu Cher</option>
      <option value="10">Abordable</option>
      <option value="11">Cher</option>
      <option value="12">Très Cher</option> 
  </select><br><br>
  <div class="input_name">Difficulté : </div>
  <select class= "catChoice" name="recipeDifficulty" required>
    <option value="1">Très facile</option>
    <option value="2">Facile</option>
    <option value="3">Moyen</option>
    <option value="4">Difficile</option> 
  </select><br><br>
  <div class="input_name">Durée : </div>
  <select class= "catChoice" name="recipeDuration" required>
    <option value="5">Rapide</option>
    <option value="6">Normal</option>
    <option value="7">Long</option>
    <option value="8">Très Long</option> 
  </select><br><br>
  <div class="input_name">Recette : </div><textarea class= "catChoice" type="textarea" placeholder="Write something.." name="description" rows="10" required></textarea><br><br>
  <div class="input_name">Ingrédients : </div><textarea class= "catChoice" type="textarea" placeholder="Write something.." name="ingredient" rows="10" required></textarea><br><br>
  <button data-theme="mytheme" class="btn bg-secondary text-accent"><input type="submit" name="soumission" value="Submit"><br></button>
</form>
</div>

<script>
  function checkFile() {
    var file = document.getElementById("fileInput").files[0];

    // check if file is an image
    if (!file.type.startsWith("image/")) {
      alert("Sélectionnez une image s'il vout plait");
      return;
    }

    // create an image object to check its dimensions
    var img = new Image();
    img.src = URL.createObjectURL(file);
    img.onload = function() {
      // check if image has 600x400 size
      if (img.width !== 600 || img.height !== 400) {
        alert("L'image doit faire exactement 600x400px.");
        }
    };
  }

</script>