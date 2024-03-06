<!DOCTYPE html>
<html lang="fr">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2671737190304214" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RJ2PJCWKBX"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RJ2PJCWKBX');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kiloukoi : @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script type="text/javascript" src="https://cache.consentframework.com/js/pa/37783/c/UZKH3/stub"></script>
    <script type="text/javascript" src="https://choices.consentframework.com/js/pa/37783/c/UZKH3/cmp" async></script>    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <link rel="icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        #gdpr-banner {
            background-color: #343a40; /* Couleur de fond */
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
            padding: 15px;
        }

        #gdpr-banner a {
            color: #ffffff; /* Couleur du texte */
        }

        #gdpr-banner a:hover {
            color: #ffffff; /* Couleur du texte au survol */
            text-decoration: underline; /* Souligner au survol */
        }

        #gdpr-accept {
            background-color: #007bff; /* Couleur du bouton Accepter */
            color: #ffffff; /* Couleur du texte du bouton Accepter */
            border-color: #007bff; /* Couleur de la bordure du bouton Accepter */
            transition: background-color 0.3s ease; /* Transition de couleur au survol */
        }

        #gdpr-accept:hover {
            background-color: #0056b3; /* Couleur du bouton Accepter au survol */
        }
        .hidden {
            display:none;
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
                <ul class="list-group list-group-flush">
                    <li class="list-group"><a href="/pourquoi-kiloukoi" class="link-secondary">Pourquoi kiloukoi ?</a></li>
                    <li class="list-group"><a href="/a-propos" class="link-secondary">Fonctionnement</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Blog</a></li>
                    <li class="list-group"><a href="mailto:contact@kiloukoi.be" class="link-secondary">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <h6>Louez un objet</h6>
                <ul class="list-group list-group-flush">
                    @foreach ($getAnnouncesCategories as $category)
                        <li class="list-group"><a href="" class="link-secondary">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <h6>Assistance</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group"><a href="/pourquoi-mon-annonce-est-refusee" class="link-secondary">Mon annonce n'a pas été validée</a></li>
                </ul>
            </div>
            <div class="col">
                <h6>Informations</h6>
                <ul class="list-group list-group-flush">
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
