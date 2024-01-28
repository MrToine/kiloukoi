@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Mes offres de location</h2>
                <div class="row mt-4">
                    @forelse ($user->announces->sortByDesc('id') as $announce)
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
