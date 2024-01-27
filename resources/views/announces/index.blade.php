@extends('layout')

@section('title', 'Liste des annonces')

@section('content')
    <div class="bg-light p-5 mb-5 text-center bg-img-home">
        <img src="{{ asset('images/website/logo_lg.png') }}" alt="" style="height:120px;">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="text" placeholder="mot clef" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <input type="number" placeholder="prix max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
            <input type="text" placeholder="ville" class="form-control" name="city" value="{{ $input['city'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>

    <div class="container">
        <a href="{{ route('announce.create') }}" class="btn btn-success btn-lg">Proposer une location !</a>
        <div class="row mt-4">
            @forelse ($announces as $announce)
                <div class="col-3 mb-4">
                    @include('announces.card')
                </div>
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
