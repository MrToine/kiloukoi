@extends('layout')

@section('title', 'Liste des annonces')

@section('content')
    <div class="bg-light p-3 mb-3 text-center bg-img-home">
        <img src="{{ asset('images/website/logo_lg.png') }}" alt="Logo" style="height: 80px;" class="mb-2">
        <form action="" method="get" class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                    <input type="text" placeholder="Mot-clé" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                    <input type="number" placeholder="Prix max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                    <input type="text" placeholder="Ville" class="form-control" name="city" value="{{ $input['city'] ?? '' }}">
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
                    <button class="btn btn-primary flex-grow-0">Rechercher</button>
                </div>
            </div>
        </form>
    </div>


    <div class="container">
        @include('shared.flash')
        <a href="{{ route('announce.create') }}" class="btn btn-success btn-lg mb-3">Proposer une location !</a>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @forelse ($announces as $announce)
                @if ($announce->availability)
                    <div class="col mb-4">
                        @include('announces.card')
                    </div>
                @endif
            @empty
                <div class="col">
                    Aucune annonce trouvée :(
                </div>
            @endforelse
        </div>
    </div>

    <div class="container my-4">
        {{ $announces->links() }}
    </div>
@endsection
