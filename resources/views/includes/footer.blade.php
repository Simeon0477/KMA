@vite(['resources/css/footer.css', 'resources/js/app.js'])
<footer>
  <div  class="footer">
      <div class="items">
        <h2  class="text-primary">Liens Rapides</h2>
        <ul type="circle">
          <li><a href="">A propos de nous</a></li>
          <li><a href="{{route('posts.postsTable')}}">Postes</a></li>
          <li><a href="{{route('posts.create')}}">Ajouter un poste</a></li>
          <li><a href="{{route('register')}}">S'inscrire</a></li>
        </ul>
      </div>
      <div class="items">
          <h2 class="text-primary">Contacts</h2>
          <div class="icon">
              <img src="{{ Vite::asset('resources/ico/ico (4).png') }}"> ecole nationale supérieure polytechnique de yaoundé
          </div>
          <div class="icon">
              <img src="{{ Vite::asset('resources/ico/ico (6).png') }}"> +237 696 553 621, +237 621 669 250
          </div>
          <div class="icon">
              <img src="{{ Vite::asset('resources/ico/ico (5).png') }}"> kamermotion_art@gmail.com
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
