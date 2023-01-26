<div class="bg-white" data-theme="mytheme">
  <div class="ori mx-auto my-10 w-full max-w-xs">
    <form class="mb-4 rounded-3xl bg-base-100 px-8 pt-6 pb-8 shadow-md" action="/Compte/inscrire/" method="get">
      <div class="mb-4">
        <label class="mb-2 block text-sm font-bold text-gray-700" for="pseudo"> Pseudo </label>
        <input type="text" id="pseudo" placeholder="Pseudo" name="pseudo" class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" />
      </div>

      <div class="mb-4">
        <label class="mb-2 block text-sm font-bold text-gray-700" for="email"> Email </label>
        <input type="email" id="email" placeholder="Email" name="email" class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" />
      </div>

      <div class="mb-6">
        <label class="mb-2 block text-sm font-bold text-gray-700" for="password">Mot de passe</label>
        <input name="password" class="focus:shadow-outline mb-3 w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" id="password" type="password" placeholder="**********" />
        <p class="text-xs italic text-red-600"><?=$_SESSION['error_message']?></p>
      </div>
      <div class="flex items-center justify-between">
        <input type="submit" value="Envoyer" style="border: 1px solid black;" class="focus:shadow-outline rounded bg-accent py-2 px-4 font-bold text-white hover:bg-accent-focus focus:outline-none" />
        <a href="/compte/connexion" class="btn btn-ghost">J'ai déja un compte</a>
      </div>
    </form>
  </div>
</div>

<br>
