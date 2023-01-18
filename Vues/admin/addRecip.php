<div class="createRecipeFlex">
<h1 class="addRecipTitle">Créer une recette :</h1>
<form class="addRecipForm" action="add-recip.php" method="post">
  <div class="input_name">Nom de la recette : </div><input class= "inputRecipeName" type="text" name="recip_name " required> <br><br>
  <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Recipe Image</label>
  <input class="inputImageRecipe block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="fileInput" type="file" onchange="checkFile()">
  <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG (doit faire exactement 600x400).</p>
  <div class="input_name">Prix : </div>
  <select class= "catChoice" name="recip_name" required>
      <option valeur="Peu Cher">Peu Cher</option>
      <option valeur="Abordable">Abordable</option>
      <option valeur="Cher">Cher</option>
      <option valeur="Très Cher">Très Cher</option> 
  </select><br><br>
  <div class="input_name">Difficulté : </div>
  <select class= "catChoice" name="recip_difficulty" required>
    <option valeur="Très Facile">Très simple</option>
    <option valeur="Abordable">Simple</option>
    <option valeur="Cher">Moyen</option>
    <option valeur="Très Cher">Difficile</option> 
  </select><br><br>
  <div class="input_name">Durée : </div>
  <select class= "catChoice" name="recip_duration" required>
    <option valeur="Très rapide">Très rapide</option>
    <option valeur="Rapide">Rapide</option>
    <option valeur="Assez long">Assez long</option>
    <option valeur="Très Cher">Long</option> 
  </select><br><br>
  <div class="input_name">Ingrédients : </div><textarea class= "catChoice" type="textarea" placeholder="Write something.." name="ingredients" rows="10" required></textarea><br><br>
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