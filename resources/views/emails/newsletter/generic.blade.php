<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Style personnalisé pour les cartes */
        .custom-card {
            height: 200px; /* Hauteur personnalisée */
        }

    </style>
</head>
<body>
    <strong>{{ $newsletter->title }}</strong>

    {!! $newsletter->content !!}

    <small>
        <center><a href="{{ route('newsletter.unfollow', ['mail' => $mail]) }}">Se désabonner</a></center>
    </small>
</body>
</html>

