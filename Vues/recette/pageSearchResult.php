<div class="flexSearchRecettes" >
<?php
$i = 0;
while(isset($A_vue['recettes'][$i]['titre'])) { 
?>
        <div data-theme="mytheme" class="flexAllRecette card card-compact w-96 bg-accent shadow-xl" >
        <figure><img src="data:image/png;base64,<?= base64_encode($A_vue['recettes'][$i]['image']) ?>" alt="<?= $A_vue['recettes'][$i]['titre'] ?>"></figure>
        <div class="card-body">
            <h2 class="card-title text-base-200"><?= $A_vue['recettes'][$i]['titre'] ?></h2>
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