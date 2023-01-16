
<p class="text-base-200 text-warning"><?= $A_vue['compte'][0]['Pseudo'] ?></p>
<p> s'inscrire </p>
<form action="/Compte/inscrire/" method=get>
  <input type="text" id="email" placeholder="pseudo" name="pseudo"><br><br>
  <input type="email" id="email" name="email" placeholder="Email"><br><br>
  <input type="password" id="password" name="password" placeholder="Password"><br><br>
  <input type="submit" value="Envoyer" style="border: 1px solid black;">
</form>
<a href="/compte/connexion" class="btn btn-accent bg-secondary">J'ai déja un compte</a>
