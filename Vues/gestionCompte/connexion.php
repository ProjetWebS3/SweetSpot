
<p class="text-base-200 text-warning">
  Bonjour 
<?= $_SESSION['login']['Pseudo'] ?> <br>
</p>  
<a href="/compte/inscription" class="btn btn-ghost">Je n'ai pas de compte</a>

<form action="/Compte/connecter/" method=get>
  <input type="email" id="email" name="email" placeholder="Email" class="input w-full max-w-xs"><br><br>
  <input type="password" id="password" name="password" placeholder="Mot de passe" class="input w-full max-w-xs"><br><br>
  <input type="submit" value="Envoyer" style="border: 1px solid black;" class="btn btn-outline">
</form>