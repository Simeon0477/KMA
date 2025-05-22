 <!-- Navbar section -->

 @vite(['resources/js/app.js'])
 
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('posts.index')}}">KamerMotion Art</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
              <line x1="3" y1="15" x2="27" y2="15"></line>
              <line x1="3" y1="9" x2="27" y2="9"></line>
              <line x1="3" y1="21" x2="27" y2="21"></line>
            </svg>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Options visibles pour tous (connectés ou non) -->
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => Route::is('posts.index')]) href="{{route('posts.index')}}">Accueil</a>
                </li>
                
                @if (Auth::check())
                    <!-- Options pour utilisateurs connectés (standards et admins) -->
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => Route::is('profile')]) href="{{route('profile')}}">Mon Profil</a>
                    </li>
                    
                    @if (Auth::user()->isAdmin())
                        <!-- Options uniquement pour les administrateurs -->
                        <!--li class="nav-item">
                            <a @class(['nav-link', 'active' => Route::is('posts.trash')]) href="{{route('posts.trash')}}">Corbeille</a>
                        </li-->
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => Route::is('posts.postsTable')]) href="{{route('posts.postsTable')}}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => Route::is('users.index')]) href="{{route('users.index')}}">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => Route::is('posts.create')]) href="{{route('posts.create')}}">Créer un Post</a>
                        </li>
                    @endif
                    
                    <!-- Bouton de déconnexion pour tous les utilisateurs connectés -->
                    <li class="nav-item">
                        <form action="{{{route('logout')}}}" method="POST">
                            @csrf
                            <button type="submit" @class(['nav-link', 'active' => Route::is('logout')]) style="background: none; border: none;">Se déconnecter</button>
                        </form>
                    </li>
                @else
                    <!-- Options uniquement pour les visiteurs non connectés -->
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => Route::is('login')]) href="{{route('login')}}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => Route::is('register')]) href="{{route('register')}}">S'inscrire</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>