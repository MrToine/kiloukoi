@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Mes annonces</h2>
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
            @include('user.gestion_bar')
        </div>
    </div>
@endsection
