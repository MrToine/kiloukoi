@extends('layout')

@section('title', $request->exists ? "Éditer une annonce" : "Créer une annonce")

@section('content')
    <div class="container">
        <h1 class="mt-4">@yield('title')</h1>
        <form action="{{ route($request->exists ? 'announce.request.update' : 'announce.request.store', ['request' => $request]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($request->exists ? 'put' : 'post')

            <div class="row">
                <div class="col-md-8">
                    <div class="row mb-3">
                        @include('shared.input', ['class' => 'col-md-6', 'label' => 'titre', 'name' => 'title', 'value' => $request->title])
                    </div>
                    <div class="row mb-3">
                        @include('shared.input', ['class' => 'col-md-6', 'type' => 'number', 'label' => 'prix demandé', 'name' => 'price', 'value' => $request->price])
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'class' => 'mb-3', 'label' => 'Contenu de la recherche', 'name' => 'description', 'value' => $request->description])
                    <div class="row mb-3">
                        @include('shared.input', ['class' => 'col-md-4', 'label' => 'adresse', 'name' => 'adress', 'value' => $request->adress])
                        @include('shared.input', ['class' => 'col-md-4', 'label' => 'code postale', 'name' => 'postalcode', 'value' => $request->postalcode])
                        @include('shared.input', ['class' => 'col-md-4', 'label' => 'ville', 'name' => 'city', 'value' => $request->city])
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit">
                    @if ($request->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
