<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kiloukoi : @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <link rel="icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <style>
        .bg-img-home {
            background-image: url('/images/website/background.png');
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 50px;
        }

        .bg-img-account {
            background-image: url('/images/website/account_bg.png');
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 50px;
        }

        .bg-footer {
            background-image: url('/images/website/logo_inverse.png');
            background-repeat: no-repeat;
            background-position: right;
            min-height: 150px;
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
                            <a href="{{ route('account.announces') }}" class="nav-link">
                                Mon compte
                                @include('shared.notifications')
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
                                <a href="{{ route('admin.announce.index') }}" class="nav-link link-warning">Admin</a>
                            @endrole
                        </li>
                    </ul>
                @endauth

            </div>
        </div>
    </nav>

    @yield('content')

    <div class="bg-dark p-5 bg-footer mt-5">
        <div class="row">
            <div class="col">
                <h6>kiloukoi.be</h6>
                <ul classe="list-group list-group-flush">
                    <li class="list-group"><a href="" class="link-secondary">Pourquoi kiloukoi ?</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Fonctionnement</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Blog</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <h6>Louez un objet</h6>
                <ul classe="list-group list-group-flush">
                    @foreach ($getAnnouncesCategories as $category)
                        <li class="list-group"><a href="" class="link-secondary">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <h6>Assistance</h6>
                <ul classe="list-group list-group-flush">
                    <li class="list-group"><a href="" class="link-secondary">Mon annonce n'a pas été validée</a></li>
                </ul>
            </div>
            <div class="col">
                <h6>Informations</h6>
                <ul classe="list-group list-group-flush">
                    <li class="list-group"><a href="" class="link-secondary">Politique de confidentialité</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Être un bon locataire</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Guide du parfait annonceur</a></li>
                </ul>
            </div>
        </div>
        <div class="row-col align-self-end">
            2024 kiloukoi
        </div>
    </div>
    <script>
        document.querySelectorAll('select[multiple]').forEach(function(element) {
            new TomSelect(element, {plugins: {remove_button: {title: 'supprimer'}}});
        });
    </script>
</body>
</html>
