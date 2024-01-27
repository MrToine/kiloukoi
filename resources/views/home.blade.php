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
                <div class="col">
                    @include('announces.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
