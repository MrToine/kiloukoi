@extends('layout')

@section('title', 'Votre avis compte !')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-7 mx-auto">
            <div class="alert alert-success">
                Merci beaucoup d'avoir partagé votre avis et votre note ! Votre contribution est précieuse pour améliorer la qualité de notre service. Vos retours aident non seulement les propriétaires, mais aussi les futurs locataires à prendre des décisions éclairées. Nous apprécions votre engagement et votre confiance envers notre plateforme.
            </div>
            <p>
                Souhaitez-vous explorer davantage d'annonces ? Consultez nos dernières offres et trouvez la location parfaite pour vos besoins.
            </p>
            <a href="{{ route('announce.index') }}" class="btn btn-primary">Découvrir les annonces</a>
        </div>
    </div>
</div>

@endsection
