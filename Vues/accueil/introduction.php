<div class="flexRecettes" >
<?php
for ($i = 0; $i < 3; $i++) {
?>
    <div data-theme="mytheme" class="flexRecette card card-compact bg-accent shadow-xl" >
        <figure><img src="data:image/png;base64,<?= base64_encode($A_vue['recette'][$i]['image']) ?>" alt="<?= $A_vue['recette'][$i]['titre'] ?>"></figure>
        <div class="card-body">
            <h2 class="card-title text-base-200"><?= $A_vue['recette'][$i]['titre'] ?></h2>
            <p class="text-base-200 text-warning">Note: <?= rating_stars($A_vue['recette'][$i]['note']) ?></p>
            <div class="card-actions justify-end">
            <a href="/recette/show/<?= $A_vue['recette'][$i]['id_recette'] ?>" class="btn btn-accent bg-secondary">Recette</a>
        </div>
    </div>
</div>
<?php
}
?>
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