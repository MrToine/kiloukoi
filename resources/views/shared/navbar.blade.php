<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('website.index') }}">
            <img src="{{ asset('images/website/logo_horizontal.png') }}" alt="" style="height:30px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @php
            $route = request()->route()->getName();
        @endphp

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'infos')]) href="/devblog/majs-list">Dernières Infos</a></li>
                <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'announce.')]) href="{{ route('announce.index') }}">Annonces</a></li>
                <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'request.')]) href="{{ route('announce.request.index') }}">Demandes</a></li>
            </ul>

            <div class="ms-auto">
                @guest
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link link-info">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link link-success">Inscription</a>
                        </li>
                    </ul>
                @endguest

                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('announce.create') }}" class="btn btn-success">Proposer une location <i class="fa-solid fa-hand-point-up"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('announce.request.create') }}" class="nav-link">Je recherche !</a>
                        </li>
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
</nav>
