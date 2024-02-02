@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 order-md-1 order-1 mb-3">
                @include('user.gestion_bar')
            </div>
            <div class="col-md-9 order-md-2 order-2">
                <h2>Mes annonces</h2>
                <div class="row mt-4">
                    @forelse ($user->announces->sortByDesc('id') as $announce)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                            @include('announces.card')
                        </div>
                    @empty
                        <div class="col-12">
                            Aucune annonce
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
