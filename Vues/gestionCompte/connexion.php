
<p class="text-base-200 text-warning">
  Bonjour
<?= $_SESSION['pseudo'] ?> <br>
</p>  

<div class="ori mx-auto my-10 w-full max-w-xs">
  <form class="mb-4 rounded-3xl bg-white px-8 pt-6 pb-8 shadow-md" action="/Compte/connecter/" >
    <div class="mb-4">
      <label class="mb-2 block text-sm font-bold text-gray-700" for="email" > Email </label>
      <input name="email" class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" id="email" type="text" placeholder="Email" />
    </div>
    <div class="mb-6">
      <label class="mb-2 block text-sm font-bold text-gray-700"   for="password">Mot de passe</label>
      <input name="password" class="focus:shadow-outline mb-3 w-full appearance-none rounded border border-red-500 py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" id="password" type="password" placeholder="******************" />
      <p class="text-xs italic text-red-500">Veuillez entrer un mot de passe.</p>
    </div>
    <div class="flex items-center justify-between">
      <input type="submit" value="Envoyer" style="border: 1px solid black;" class="focus:shadow-outline rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700 focus:outline-none">
      <a class="inline-block align-baseline text-sm font-bold text-blue-500 hover:text-blue-800" href="/compte/inscription"> S'inscrire </a>
    </div>

  </form>
</div>