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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/large.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caroussel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tom-select.css') }}">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
    <script type="text/javascript" src="https://cache.consentframework.com/js/pa/37783/c/UZKH3/stub"></script>
    <script type="text/javascript" src="https://choices.consentframework.com/js/pa/37783/c/UZKH3/cmp" async></script>    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <link rel="icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @include('shared.header')

    @yield('content')

    @include('shared.modale')

    <div class="footer">
        <div class="row">
            <div class="col c3">
                <h6>kiloukoi.be</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group"><a href="/pourquoi-kiloukoi" class="link-secondary">Pourquoi kiloukoi ?</a></li>
                    <li class="list-group"><a href="/a-propos" class="link-secondary">Fonctionnement</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Blog</a></li>
                    <li class="list-group"><a href="/contact" class="link-secondary">Contact</a></li>
                </ul>
                <form class="d-flex" action="{{ route('newsletter.follow') }}" method="post">
                    <div class="row">
                        <div class="col c4">
                            @method("post")
                            @csrf
                            <input type="email" name="email" class="form-control small-input" placeholder="name@example.com">
                        </div>
                        <div class="col c1">&nbsp;</div>
                        <div class="col c3">
                            <button class="btn btn-primary">Inscription</button>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="col c3">
                <h6>Louez un objet</h6>
                <ul class="list-group list-group-flush">
                    @foreach ($getAnnouncesCategories as $category)
                        <li class="list-group"><a href="" class="link-secondary">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col c3">
                <h6>Assistance</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group"><a href="/pourquoi-mon-annonce-est-refusee" class="link-secondary">Mon annonce n'a pas été validée</a></li>
                </ul>
            </div>
            <div class="col c3">
                <h6>Informations</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group"><a href="/politique-de-confidentialite" class="link-secondary">Politique de confidentialité</a></li>
                    <li class="list-group"><a href="/etre-un-bon-locataire" class="link-secondary">Être un bon locataire</a></li>
                    <li class="list-group"><a href="" class="link-secondary">Guide du parfait annonceur</a></li>
                </ul>
            </div>
        </div>
        <div class="center">
            &copy;2024 kiloukoi
        </div>
    </div>
    <script>
        document.querySelectorAll('select[multiple]').forEach(function(element) {
            new TomSelect(element, {plugins: {remove_button: {title: 'supprimer'}}});
        });
    </script>
</body>
</html>
