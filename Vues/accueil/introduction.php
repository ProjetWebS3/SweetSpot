<div class="flexRecettes" >
<?php
for ($i = 0; $i < 3; $i++) {
?>
    <div data-theme="mytheme" class="flexRecette card card-compact bg-accent shadow-xl" >
        <figure><img src="data:image/png;base64,<?= base64_encode($A_vue['recette'][$i]['image']) ?>" alt="<?= $A_vue['recette'][$i]['titre'] ?>"></figure>
        <div class="card-body">
            <h2 class="card-title text-base-200"><?= $A_vue['recette'][$i]['titre'] ?></h2>
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
<div data-theme ="mytheme" class = "bg-white">
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">Liste des catégories</h2>
  </br>
  <h2 class="text-2x2 font-bold tracking-tight text-gray-900">Difficultés</h2>

  <div class="grid grid-cols-4 gap-4 h-16 font-medium">
    <button class="rounded-md bg-base-100 " type="button">
      Très Facile
    </button>
    <button class="rounded-md bg-base-100 " type="button">
      Facile
    </button>
    <button class="rounded-md bg-base-100 " type="button">
      Moyen
    </button>
    <button class="rounded-md bg-base-100  " type="button">
      Difficile
    </button>
  </div>
  </br>

  <h2 class="text-2x2 font-bold tracking-tight text-gray-900">Coût</h2>
  <div class="grid grid-cols-4 gap-4 h-16 font-medium">
    <button class="rounded-md bg-secondary " type="button">
      Peu cher
    </button>
    <button class="rounded-md bg-secondary basis-1/4" type="button">
      Abordable
    </button>
    <button class="rounded-md bg-secondary basis-1/4" type="button">
      Cher
    </button>
    <button class="rounded-md bg-secondary basis-1/4" type="button">
      Très cher
    </button>
  </div>
  </br>

  <h2 class="text-2x2 font-bold tracking-tight text-gray-900">Durée</h2>
  <div class="grid grid-cols-4 gap-4 h-16 font-bold text-white">
    <button class="rounded-md bg-accent" type="button">
      Rapide
    </button>
    <button class="rounded-md bg-accent " type="button">
      Normale
    </button>
    <button class="rounded-md bg-accent" type="button">
      Moyenne
    </button>
    <button class="rounded-md bg-accent" type="button">
      Longue
    </button>
  </div>
</div> 

<h2 class="text-xl my-5">Listes des catégories</h2>

<div class="flex w-full flex-row flex-wrap justify-center">
  <?php
    $i = 0;
  while(isset($A_vue['categorie'][$i]['nom'])) { 
  ?>
  <a href="/Recette/searchByCategory/<?=$A_vue['categorie'][$i]['id_type']?>"><div style="background-color: <?=getProperColor($i)?>" class="grid flex-grow  h-28 w-28 card card-normal bg-base-300 rounded-box place-items-center"><p class="font-semibold"><?=$A_vue['categorie'][$i]['type']?></p><?=$A_vue['categorie'][$i]['nom']?></div></a>
  <div class="divider lg:divider-horizontal"></div> 
  <?php 
    $i++;
  }
  ?>
</div>
