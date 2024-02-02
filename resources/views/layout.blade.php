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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
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
    @include('shared.navbar')

    @yield('content')

    <div class="bg-dark p-5 bg-footer mt-5">
        <div class="row">
            <div class="col">
                <h6>kiloukoi.be</h6>
                <ul classe="list-group list-group-flush">
                    <li class="list-group"><a href="/pourquoi-kiloukoi" class="link-secondary">Pourquoi kiloukoi ?</a></li>
                    <li class="list-group"><a href="/a-propos" class="link-secondary">Fonctionnement</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Blog</a></li>
                    <li class="list-group"><a href="mailto:contact@kiloukoi.be" class="link-secondary">Contact</a></li>
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
                    <li class="list-group"><a href="/pourquoi-mon-annonce-est-refusee" class="link-secondary">Mon annonce n'a pas été validée</a></li>
                </ul>
            </div>
            <div class="col">
                <h6>Informations</h6>
                <ul classe="list-group list-group-flush">
                    <li class="list-group"><a href="/politique-de-confidentialite" class="link-secondary">Politique de confidentialité</a></li>
                    <li class="list-group"><a href="/etre-un-bon-locataire" class="link-secondary">Être un bon locataire</a></li>
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
