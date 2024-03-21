@extends('layout')

@section('title', ucfirst("infos"))

@section('content')
    <div class="container mt-4">
        <div class="bg-light p-3 mb-3 text-end bg-img-majlist">
            <img src="{{ asset('images/website/logo_lg.png') }}" alt="Logo" style="height: 150px;" class="mb-2">
        </div>
        <h1>Infos et Mise à jour</h1>
        <p>Vous trouverez ici toutes les actualités concernant les dernière mise à jour du site de kiloukoi.</p>
        @foreach($majs as $maj)
            @if($maj->type == "maj")
                <div class="alert alert-warning">
            @else
                <div class="alert alert-danger">
            @endif
                <strong>{{ $maj->title }} du {{ $maj->created_at->format('d/m/Y') }} :</strong> {{ $maj->content }}
            </div>
        @endforeach
    </div>
@endsection
