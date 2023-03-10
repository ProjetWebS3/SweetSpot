<div class="flexSearchRecettes" >
<?php
if(!isset($A_vue['recettes'][0]['titre'])) {?>
    <div class="alert alert-error shadow-lg">
  <div>
    <span>Aucune recette n'a été trouvé !</span>
  </div>
</div>
<?php
}
$i = 0;
while(isset($A_vue['recettes'][$i]['titre'])) {
  $_SESSION['modifier'] = -1;
?>
        <div data-theme="mytheme" class="flexAllRecette card card-compact w-96 bg-accent shadow-xl" >
        <figure><img src="data:image/png;base64,<?= base64_encode($A_vue['recettes'][$i]['image']) ?>" alt="<?= $A_vue['recettes'][$i]['titre'] ?>"></figure>
        <div class="card-body">
            <h2 class="card-title text-base-200"><?= $A_vue['recettes'][$i]['titre'] ?></h2>
            <?php
            if ($A_vue['isAdmin']) {?>
            <h3 class="text-base-200 ml-3">
              <button onclick="location.href='/admin/deleteRecipe/<?= $A_vue['recettes'][$i]['id_recette'] ?>';" class="fa-solid fa-trash fa-xl"></button>
              <button onclick="location.href='/admin/modifyRecipePage/<?= $A_vue['recettes'][$i]['id_recette'] ?>';" class="fa-solid fa-pen-to-square fa-xl ml-2"></button>
            </h3>
            <?php
            } ?>
            <p class="text-base-200 text-warning">Note: <?= rating_stars($A_vue['recettes'][$i]['note']) ?></p>
            <div class="card-actions justify-end">
            <a href="/recette/show/<?= $A_vue['recettes'][$i]['id_recette'] ?>" class="btn btn-accent bg-secondary">Recette</a>
        </div>
    </div>
</div>
<?php 
    $i++;
}
?>

<br>