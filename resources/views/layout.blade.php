<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <style>
        .bg-img-home {
            background-image: url('/images/website/background.png');
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('website.index') }}">
                <img src="{{ asset('images/website/logo_horizontal.png') }}" alt="" style="height:30px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'announce.')]) href="{{ route('announce.index') }}">Annonces</a></li>
                </ul>
            </div>
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
                            <a href="{{ route('announce.create') }}" class="btn btn-success">Proposer une location !</a>
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
                                <a href="{{ route('admin.announce.index') }}" class="nav-link link-warning">Admin</a>
                            @endrole
                        </li>
                    </ul>
                @endauth

            </div>
        </div>
    </nav>

    @yield('content')
    <script>
        document.querySelectorAll('select[multiple]').forEach(function(element) {
            new TomSelect(element, {plugins: {remove_button: {title: 'supprimer'}}});
        });
    </script>
</body>
</html>
