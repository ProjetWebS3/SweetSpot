<div class="flexRecettes" >
<?php
$_SESSION['modifier'] = -1;
for ($i = 0; $i < 3; $i++) {
?>
  <div data-theme="mytheme" class="flexRecette card card-compact bg-accent shadow-xl" >
    <figure><img src="data:image/png;base64,<?= base64_encode($A_vue['recette'][$i]['image']) ?>" alt="<?= $A_vue['recette'][$i]['titre'] ?>"></figure>
    <div class="card-body">
      <div class="flex">
        <h2 class="card-title text-base-200"><?= $A_vue['recette'][$i]['titre'] ?></h2>
        <?php
        if ($A_vue['isAdmin']) {?>
        <h3 class="text-base-200 ml-3">
          <button onclick="location.href='/admin/deleteRecipe/<?= $A_vue['recette'][$i]['id_recette'] ?>';" class="fa-solid fa-trash fa-xl"></button>
          <button onclick="location.href='/admin/modifyRecipePage/<?= $A_vue['recette'][$i]['id_recette'] ?>';" class="fa-solid fa-pen-to-square fa-xl ml-2"></button>
        </h3>
        <?php
        } ?>
      </div>
      <p class="text-base-200 text-warning">Note:<br> <?= rating_stars($A_vue['recette'][$i]['note']) ?></p>
        <div class="card-actions justify-end">
          <a href="/recette/show/<?= $A_vue['recette'][$i]['id_recette'] ?>" class="btn btn-accent bg-secondary">Recette</a> 
        </div>
    </div>
  </div>
<?php
}
?>
</div>
<div data-theme ="mytheme" class="bg-white m-5 mb-20">
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">Liste des catégories</h2>
  </br>
  <h2 class="text-2x2 font-bold tracking-tight text-gray-900">Difficultés</h2>
  <div class="grid grid-cols-4 gap-4 h-16 font-medium">
    <?php 
    for ($i = 0; $i < 4; $i++) { ?>
      <button  onclick="location.href='/Recette/searchByCategory/<?=$A_vue['categorie'][$i]['id_type']?>';" class="rounded-md bg-base-100" type="button">
        <?=$A_vue['categorie'][$i]['nom'] ?>
      </button>
    <?php } ?>
  </div>
  </br>
  <h2 class="text-2x2 font-bold tracking-tight text-gray-900">Coût</h2>
  <div class="grid grid-cols-4 gap-4 h-16 font-medium">
    <?php 
    for ($i = 8; $i < 12; $i++) { ?>
      <button  onclick="location.href='/Recette/searchByCategory/<?=$A_vue['categorie'][$i]['id_type']?>';" class="rounded-md bg-secondary basis-1/4" type="button">
        <?=$A_vue['categorie'][$i]['nom'] ?>
      </button>
    <?php } ?>
  </div>
  </br>
  <h2 class="text-2x2 font-bold tracking-tight text-gray-900">Durée</h2>
    <div class="grid grid-cols-4 gap-4 h-16 font-bold text-white">
      <?php 
      for ($i = 4; $i < 8; $i++) { ?>
        <button  onclick="location.href='/Recette/searchByCategory/<?=$A_vue['categorie'][$i]['id_type']?>';" class="rounded-md bg-accent" type="button">
          <?=$A_vue['categorie'][$i]['nom'] ?>
        </button>
      <?php } ?>
    </div>
</div> 
