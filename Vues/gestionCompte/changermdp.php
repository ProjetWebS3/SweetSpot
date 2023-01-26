<div class="bg-white" data-theme="mytheme">
  <div id="premiere" class="ori mx-auto my-10 w-full max-w-xs">
    <form class="mb-4 rounded-3xl bg-base-100 px-8 pt-6 pb-8 shadow-md" action="/Compte/reinitialiserMdp/" method="get">
      <div class="mb-4">
        <label class="mb-2 block text-sm font-bold text-gray-700" for="email"> Email </label>
        <input type="email" id="email" placeholder="Email" name="email" class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" />
        <p class="text-xs italic text-red-600"><?=$_SESSION['error_message']?></p>
      </div>
      <div class="flex items-center justify-between">
        <input id="bouton-mail-mdp" type="submit" value="Envoyer" style="border: 1px solid black;" class="focus:shadow-outline rounded bg-accent py-2 px-4 font-bold text-white hover:bg-accent-focus focus:outline-none" />
      </div>
    </form>
  </div>

  <div id="deuxieme" class="ori mx-auto my-10 w-full max-w-xs">
    <form class="mb-4 rounded-3xl bg-base-100 px-8 pt-6 pb-8 shadow-md" action="" method="get">
      <div class="mb-4">
        <label class="mb-2 block text-sm font-bold text-gray-700" for="email"> Email </label>
        <input type="text" id="digit_mdp" placeholder="0000" name="email" class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none" />
        <p class="text-xs italic text-red-600"><?=$_SESSION['error_message']?></p>
      </div>
      <div class="flex items-center justify-between">
        <input type="submit" value="Envoyer" style="border: 1px solid black;" class="focus:shadow-outline rounded bg-accent py-2 px-4 font-bold text-white hover:bg-accent-focus focus:outline-none" />
      </div>
    </form>
  </div>
</div>

<script>
  document.getElementById("deuxieme").style.display = "none"
  document.getElementById("bouton-mail-mdp").addEventListener("click", function(){
    console.log("click");
    document.getElementById("premiere").style.display = "none"
    document.getElementById("deuxieme").style.display = "block"
  });
</script>