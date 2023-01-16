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


<h2 class="testClass text-xl">Listes des catégories</h2>

<?php
for ($j = 0; $j < 3; $j++) {
?>
<div class="flexRecettes" >

<?php
for ($i = 0; $i < 4; $i++) {
?>
<div data-theme="mytheme" class="card  bg-base-100 shadow-xl bg-secondary">
  <div class="card-body">
    <h2 class="card-title">Shoes!</h2>
    <div class="card-actions justify-center">
      <button class="btn btn-primary">Go to</button>
    </div>
  </div>
</div>
<?php
}
?>
</div>
<?php
}
?>