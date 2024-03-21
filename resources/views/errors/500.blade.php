<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kiloukoi : Erreur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <link rel="icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/website/favicon.png') }}" type="image/x-icon">
</head>
<body>
    <div class="container d-flex align-items-center vh-100">
        <img src="{{ asset('images/website/logo.png') }}" alt="">
        <div class="alert alert-danger">
            <h2>500</h2>
            <p>Je crois qu'une erreur innatendue s'est produite...</p>

            <p>Si tu penses qu'il sagit d'une erreur, clique sur le bouton ci-dessous pour retourner à l'accueil. Sinon tu peut toujours prendre contact avec nous !</p>

            <p><a class="btn btn-primary" href="{{ route('website.index') }}">Retourner à l'accueil</a></p>
        </div>
    </div>
</body>
</html>
