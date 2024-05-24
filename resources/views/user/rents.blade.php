@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col c3">
                @include('user.gestion_bar')
            </div>
            <div class="col c9">
                <h2>Mes location en cours</h2>
                <div class="alert alert-info">
                    <p>Voici la liste des announce dont vous êtes le locataire.</p>
                    <p>S'il vous plaît, respectez le matériel qui vous est remis comme si c'était le votre. Ça serait dommage de ne plus pouvoir profiter des fonctionnalités avantageuse de kiloukoi !</p>
                    <p><a href="/etre-un-bon-locataire" class="link-primary">Comment être un bon locataire</a> | <a href="/le-systeme-detoiles" class="link-primary">Comment fonctionne le système d'étoiles</a></p>
                </div>
                <div class="row">
                    @forelse ($rents as $rent)
                        <div class="col c3">
                            @include('user.requests.announces_card')
                        </div>
                    @empty
                        <div class="col c3">
                            Aucune annonce
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
