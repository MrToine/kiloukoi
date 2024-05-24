@extends('layout')

@section('title', $announce->exists ? "Éditer une annonce" : "Créer une annonce")

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
        <form action="{{ route($announce->exists ? 'announce.update' : 'announce.store', ['announce' => $announce]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($announce->exists ? 'put' : 'post')

            <div class="row">
                <div class="col c8">
                    <div class="row">
                        <div class="col c6">
                            @include('shared.input', ['class' => 'col c6', 'label' => 'titre', 'name' => 'title', 'value' => $announce->title])
                        </div>
                        <div class="col c6">
                            @include('shared.select', ['class' => 'col c6', 'label' => 'Categories', 'name' => 'categories', 'value' => $announce->categories()->pluck('id'), 'multiple' => true, 'options' => $categories])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col c6">
                            @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $announce->options()->pluck('id'), 'multiple' => true, 'options' => $options])
                        </div>
                        <div class="col c4">
                            @include('shared.input', ['type' => 'number', 'label' => 'prix', 'name' => 'price', 'value' => $announce->price])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col c4">
                            @include('shared.input', ['label' => 'adresse', 'name' => 'adress', 'value' => $announce->adress])
                        </div>
                        <div class="col c4">
                            @include('shared.input', ['label' => 'code postale', 'name' => 'postalcode', 'value' => $announce->postalcode])
                        </div>
                        <div class="col c4">
                            @include('shared.input', ['label' => 'ville', 'name' => 'city', 'value' => $announce->city])
                        </div>
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'label' => 'Contenu de l\'annonce', 'name' => 'description', 'value' => $announce->description])
                    @include('shared.checkbox', ['label' => 'disponible', 'name' => 'availability', 'value' => $announce->availability])
                </div>

                <div class="col c4">
                    @foreach ($announce->pictures as $picture)
                        <img src="{{ $picture->getUrl() }}" alt="" class="w-100 d-block mb-3">
                    @endforeach
                    @include('shared.upload', ['name' => 'pictures', 'label' => 'Images', 'multiple' => true])
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit">
                    @if ($announce->exists)
                        Modifier mon annonce
                    @else
                        Créer mon annonce
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
