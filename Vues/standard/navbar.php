<div class="navbar bg-base-100" data-theme="mytheme">
  <div class="flex-1">
    <a href="/"class="btn btn-ghost normal-case text-xl">Sweet Spot</a>
    <p>
    <?php 
    if($_SESSION['pseudo'] != NULL){
      echo ("bonjour " . $_SESSION['pseudo']); 
    }?>
    </p>
  </div>
  <div class="flex-none gap-2">
    <div class="form-control">
      <form action="/Recette/search/" method=get>
        <input type="text" name="search" placeholder="Recherche" class="input input-bordered" id="searchBar" />
      </form>
    </div>
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="/img/photoProfil.png" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
        

        <?php 
        if ($_SESSION['pseudo'] != NULL) {
          echo "<li><a href= /compte/deconnexion> Logout </a></li>";
        } else {
          echo "<li><a href= /compte/inscription> Inscription </a></li>";
          echo "<li><a href= /compte/connexion> Connexion </a></li>";
        }
        ?>
      </ul>
    </div>
  </div>
</div>

<script>
  const input = document.getElementById("searchBar");
  input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("searchBarForm").submit();
    }
  });
</script>
