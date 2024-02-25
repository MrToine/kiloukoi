@extends('layout')

@section('title', 'Louez de particuliers à particuliers')

@section('content')
    <div class="bg-light p-5 mb-5 text-center bg-img-home">
        <div class="container">
            <img src="{{ asset('images/website/logo_lg.png') }}" alt="" style="height:120px;">
            <div class="alert">
                <p>{{ __('home.edito.content') }}</p>
            </div>
            <a href="{{ route('announce.create') }}" class="btn btn-success btn-lg mb-2">Proposer une location !</a>
            <a href="{{ route('announce.index') }}" class="btn btn-primary btn-lg">Parcourir</a>
        </div>
    </div>

    <div class="container">
        @include('shared.flash')
        <div class="alert alert-warning">
            <strong>Mise à jour 25/02/2024 : </strong><em>Ajout de la fonctionnalité de récupération de mot de passe en cas d'oubli de ce dernier.</em>.<br>
            Si vous avez rencontré un problème sur notre site, veuillez nous en informer en remplissant le formulaire dans le lien ci-dessous.
            Nous prendrons les mesures nécessaires pour résoudre le problème.<br>
            <a href="{{ route('contact.form') }}" class="nav-link link-info">Contacter un administrateur</a>
        </div>

        <h2 class="mb-4">Les dernières offres de location</h2>
        <div class="row">
            @foreach ($announces as $announce)
                @if ($announce->availability)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        @include('announces.card')
                    </div>
                @endif
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-12 col-md-6 mb-4">
                <h2>Trouvez ce que vous cherchez !</h2>
                <p>Explorez notre communauté pour louer du matériel entre particuliers. Que vous ayez besoin d'outils, d'équipement sportif, ou d'autres articles, nous facilitons le processus de location.</p>
            </div>
            <div class="col-12 col-md-6">
                <h2>Louez ce que vous avez !</h2>
                <p>Partagez votre matériel avec notre communauté en proposant des locations. C'est simple et bénéfique.</p>
            </div>
        </div>
    </div>
@endsection
