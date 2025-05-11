@vite(['resources/css/footer.css', 'resources/js/app.js'])
<footer>
  <div  class="footer">
      <div class="items">
        <h2  class="text-primary">Liens Rapides</h2>
        <ul type="circle">
          <li><a href="">A propos de nous</a></li>
          <li><a href="">Postes</a></li>
          <li><a href="">Ajouter un poste</a></li>
          <li><a href="">Se connecter</a></li>
        </ul>
      </div>
      <div class="items">
          <h2 class="text-primary">Contacts</h2>
          <div class="icon">
              <img src="{{ Vite::asset('resources/ico/ico (4).png') }}"> xxxxxxxxxxxxxxxxxxxxxxxxxx
          </div>
          <div class="icon">
              <img src="{{ Vite::asset('resources/ico/ico (6).png') }}"> +237 xxx xxx xxx, +237 xxx xxx xxx
          </div>
          <div class="icon">
              <img src="{{ Vite::asset('resources/ico/ico (5).png') }}"> kamermotion-art@gmail.com
          </div>
          <div class="network">
              <a href="https://www.facebook.com/share/18UEPiARXo/" target="blank"><img src="{{ Vite::asset('resources/ico/ico (1).png') }}"></a>
              <a href=""><img src="{{ Vite::asset('resources/ico/ico (2).png') }}"></a>
              <a href=""><img src="{{ Vite::asset('resources/ico/ico (3).png') }}"></a>
          </div>
      </div>
    </div>
  </div>  
  <div class="subfooter">
    <span class="text-light">KamerMotion Art © 2025</span>
  </div>
</footer>
