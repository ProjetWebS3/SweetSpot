<h1 class="text-3xl text-center">Créer une recette :</h1>
<br />
<div class="flex items-center justify-center p-12">
<div class="mx-auto w-full max-w-[550px]">
  <form class="bg-pink-50 p-10 rounded-md" action="/admin/addRecipe" method="post" enctype="multipart/form-data">
    <div class="mb-5">
      <label for="name" class="mb-3 block text-base font-medium text-[#07074D]"> Nom de la recette </label>
      <input type="text" name="titre" id="name" placeholder="Gateau au chocolat" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
    </div> <br>
      <label for="name" class="mb-3 block text-base font-medium text-[#07074D]"> Choisir une  image
        <span class="sr-only">Choose a recipe picture</span>
        <input type="file" class="block w-full text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-gray-50 file:text-gray-700
        hover:file:bg-gray-100
        " id="fileInput" name="image" onchange="checkFile()" required/>
        <p class="mt-1 text-xs text-gray-500" id="file_input_help">PNG, JPG (doit faire exactement 600x400).</p>
      </label><br>
    <div class="mb-5">
      <p>Prix :</p>
        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" name="recipePrice" required>
          <option value="9">Peu Cher</option>
          <option value="10">Abordable</option>
          <option value="11">Cher</option>
          <option value="12">Très Cher</option></select>
          <br>
    </div>
    <div class="mb-5">
      <p>Difficulté :</p>
        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" name="recipeDifficulty" required>
          <option value="1">Très facile</option>
          <option value="2">Facile</option>
          <option value="3">Moyen</option>
          <option value="4">Difficile</option></select>
          <br>
    </div>
    <div class="mb-5">
      <p>Durée :</p>
        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" name="recipeDuration" required>
          <option value="5">Rapide</option>
          <option value="6">Normal</option>
          <option value="7">Long</option>
          <option value="8">Très long</option></select>
          <br>
    </div><br><br>
    <div class="mb-5">
      <label for="message" class="mb-3 block text-base font-medium text-[#07074D]"> Ingrédients </label>
      <textarea rows="4" name="ingredient" id="message" placeholder="- ... &#10 - ... &#10 - ..."class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required></textarea>
    </div>
    <div class="mb-5">
      <label for="message" class="mb-3 block text-base font-medium text-[#07074D]"> Préparation </label>
      <textarea rows="4" name="description" id="message" placeholder="1 ère Etape : &#10 ..." class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required></textarea>
    </div>
    <button class="btn bg-gray-400 text-white justify-center"><input type="submit" name="soumission" value="Submit"><br></button> 
  </form>
</div>
</div>
<script>
  function checkFile() {
    var file = document.getElementById("fileInput").files[0];
    // check if file is an image
    if (!file.type.startsWith("image/")) {
      alert("Sélectionnez une image s'il vout plait");
      document.getElementById("fileInput").value = null;
      return;
    }
    // create an image object to check its dimensions
    var img = new Image();
    img.src = URL.createObjectURL(file);
    img.onload = function() {
      // check if image has 600x400 size
      if (img.width !== 600 || img.height !== 400) {
        alert("L'image doit faire exactement 600x400px.");
        document.getElementById("fileInput").value = null;
        }
    };
  }
</script>

<br>