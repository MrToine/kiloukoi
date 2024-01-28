@extends('layout')

@section('content')
    <div class="bg-light p-5 mb-5 text-center bg-img-home">
        <div class="container">
            <img src="{{ asset('images/website/logo_lg.png') }}" alt="" style="height:120px;">
            <div class="alert">
                <p>{{ __('home.edito.content') }}</p>
            </div>
            <a href="{{ route('announce.create') }}" class="btn btn-success btn-lg">Proposer une location !</a>
            <a href="{{ route('announce.index') }}" class="btn btn-primary btn-lg">parcourir</a>
        </div>
    </div>

    <div class="container">

        <h2>Les dernières offres de location</h2>
        <div class="row">
            @foreach ($announces as $announce)
                @if ($announce->availability)
                    <div class="col">
                        @include('announces.card')
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="container">
                <h2>Trouvez ce que vous cherchez !</h2>
                <p>Explorez notre communauté pour louer du matériel entre particuliers. Que vous ayez besoin d'outils, d'équipement sportif, ou d'autres articles, nous facilitons le processus de location.</p>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <h2>Louez ce que vous avez !</h2>
                <p>Partagez votre matériel avec notre communauté en proposant des locations. C'est simple et bénéfique.</p>
            </div>
        </div>
    </div>

@endsection
