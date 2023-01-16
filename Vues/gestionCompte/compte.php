
<p class="text-base-200 text-warning"><?= $A_vue['compte'][0]['Pseudo'] ?></p>
  
<form action="/Compte/show/" method=get>
  <label for="email">Pseudo :</label>
  <input type="text" id="email" name="pseudo" style="border: 1px solid black;"><br><br>
  <label for="email">Email :</label>
  <input type="email" id="email" name="email" style="border: 1px solid black;"><br><br>
  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" style="border: 1px solid black;"><br><br>
  <input type="submit" value="Envoyer" style="border: 1px solid black;">
</form>
