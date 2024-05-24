@extends('layout')

@section('title', 'Louez de particuliers à particuliers')

@section('content')
    <div class="container bg-home">
        <div class="container">
            <p>{{ __('home.edito.content') }}</p>
            <a href="{{ route('announce.create') }}" class="btn btn-success btn-lg mb-2">Proposer une location !</a>
            <a href="{{ route('announce.index') }}" class="btn btn-primary btn-lg">Parcourir</a>
        </div>
    </div>

    <div class="container">
        @include('shared.flash')

        <h2 class="">Les dernières offres de location</h2>
        <div class="row">
            @foreach ($announces as $announce)
                @if ($announce->availability)
                    <div class="col c2">
                        @include('announces.card')
                    </div>
                @endif
            @endforeach
            <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2671737190304214"
                crossorigin="anonymous"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="fluid"
                data-ad-layout-key="-6r+df-25-bb+r7"
                data-ad-client="ca-pub-2671737190304214"
                data-ad-slot="3434160540"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>-->
        </div>

        <div class="row">
            <div class="container bg-home col c5 bg-loupe">
                <h2>Trouvez ce que vous cherchez !</h2>
                <p>Explorez notre communauté pour louer du matériel entre particuliers. Que vous ayez besoin d'outils, d'équipement sportif, ou d'autres articles, nous facilitons le processus de location.</p>
            </div>
            <div class="container bg-home col c5 bg-louer">
                <h2>Louez ce que vous avez !</h2>
                <p>Partagez votre matériel avec notre communauté en proposant des locations. C'est simple et bénéfique.</p>
            </div>
        </div>
    </div>
@endsection
