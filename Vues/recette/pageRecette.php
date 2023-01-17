

<br>
<form action="/Recette/commenter/" method=get>
<input type="password" id="password" name="commentaire" placeholder="Commentaire" class="input w-full max-w-xs"><br><br>
<input type="submit" value="Envoyer" style="border: 1px solid black;" class="btn btn-outline">
</form>

<p class="text-base-200 text-warning"><?= $A_vue['recette'][0]['description'] ?></p>
