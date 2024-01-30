@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Mes location en cours</h2>
                <div class="alert alert-info">
                    <p>Voici la liste des announce dont vous êtes le locataire.</p>
                    <p>S'il vous plaît, respectez le matériel qui vous est remis comme si c'était le votre. Ça serait dommage de ne plus pouvoir profiter des fonctionnalités avantageuse de kiloukoi !</p>
                    <p><a href="/etre-un-bon-locataire" class="link-primary">Comment être un bon locataire</a> | <a href="/le-systeme-detoiles" class="link-primary">Comment fonctionne le système d'étoiles</a></p>
                </div>
                <div class="row mt-4">
                    @forelse ($rents as $announce)
                        <div class="col-3 mb-3">
                            @include('announces.card')
                        </div>
                    @empty
                        <div class="col-3 mb-3">
                            Aucune annonce
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-3">
                <h2>Gestion</h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('account.rents.request') }}" class="nav-link link-danger">Traiter les demandes en cours</a>
                    </li>
                    <li class="list-group-item">
                        <a href="" class="nav-link link-primary">Mofidier une annonce</a>
                    </li>
                    <li class="list-group-item">
                        <a href="" class="nav-link link-primary">supprimer une annonce</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
