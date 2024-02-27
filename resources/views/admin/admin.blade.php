<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin -> @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        button.button-delete {
            background: rgba(255, 0, 0, 0.5);
            border: none;
            color: white;
            min-height:50px;
        }
        .mt-7 {
            margin-top: 6rem; /* ou la valeur de marge supérieure souhaitée */
        }
        .mt-6 {
            margin-top: 5rem; /* ou la valeur de marge supérieure souhaitée */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg z-index-2 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.home') }}">
                <img src="{{ asset('images/admin/logo_horizontal.png') }}" alt="" style="height:50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'admin.home')]) href="{{ route('admin.home') }}">Gestion</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => str_contains($route, 'admin.announce')]) href="{{ route('admin.announce.index') }}">Requêtes @include('admin.shared.requests_notification')</a></li>
                </ul>
                <div class="ms-auto">
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="nav-link link-danger">Déconnexion</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('website.index') }}" target="_blank" class="nav-link link-info">Retour au site -></a>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-7">
        @include('shared.flash')
        @include('admin.shared.breadcrumb')

        @yield('content')
    </div>

    <script>
        document.querySelectorAll('select[multiple]').forEach(function(element) {
            new TomSelect(element, {plugins: {remove_button: {title: 'supprimer'}}});
        });
    </script>
</body>
</html>
