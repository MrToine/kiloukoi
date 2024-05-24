@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col c3">
                @include('user.gestion_bar')
            </div>
            <div class="col c8">
                <h2>Mes annonces</h2>
                <div class="row">
                    @forelse ($user->announces->sortByDesc('id') as $announce)
                        <div class="col c3">
                            @include('announces.card')
                        </div>
                    @empty
                        <div class="col c12">
                            Aucune annonce
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
