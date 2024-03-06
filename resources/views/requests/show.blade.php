@extends('layout')

@section('title', $request->title)

@section('content')
    <div class="container">
        <h1>{{ $request->title }}</h1>
        <h5>{{ $request->postalcode }} - {{ $request->city }}</h5>
        <hr>
        <div class="row">
            <div class="col-4">
                <h2>Tarif journalier</h2>
                <div class="text-primary fw-bold" style="font-size:4rem;">{{ $request->price }}€</div>
            </div>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($request->description) !!}</p>
        </div>
    </div>

@endsection
