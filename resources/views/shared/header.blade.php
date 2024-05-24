<header>
    <nav class="navbar">
        <div class="baseline">
            <span class="baseline-name">
                <img src="{{ asset('images/website/logo_sin_text.png') }}" class="baseline-logo" alt="logo"><br>
                Kiloukoi
            </span>
            <span class="baseline-slogan">Explorez Kiloukoi - Votre plateforme de location de matériel entre particuliers. Simplifiez vos projets, économisez et partagez ce que vous avez avec toute la Belgique !.</span>
        </div>
        <div class="subheader">
            <div class="container-fluid">        
                @php
                    $route = request()->route()->getName();
                @endphp

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('website.index') }}" class="nav-link link-info"><i class="fa-solid fa-home"></i></a></li>
                        <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'infos')]) href="/devblog/majs-list">Actus</a></li>
                        <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'announce.')]) href="{{ route('announce.index') }}">Annonces</a></li>
                        <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'request.')]) href="{{ route('announce.request.index') }}">Demandes</a></li>
                        
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link link-connexion">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link link-register">Inscription</a>
                            </li>
                        @endguest

                        @auth
                                <li class="nav-item">
                                    <a href="{{ route('announce.create') }}" class="btn btn-success">Proposer une location <i class="fa-solid fa-hand-point-up"></i></a>
                                </li>

                                <!--    A FIXER
                                <li class="nav-item">
                                    <a href="{{ route('announce.request.create') }}" class="nav-link">Rechercher</a>
                                </li>-->
                                <li class="nav-item">
                                    <a href="{{ route('account.announces') }}" class="nav-link">
                                        Mon compte @include('shared.notifications')
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="nav-link link-danger">Déconnexion</button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    @role('admin')
                                        <a href="{{ route('admin.home') }}" class="nav-link link-warning">Admin @include('admin.shared.requests_notification')</a>
                                    @endrole
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
            
    </nav>
</header>
    