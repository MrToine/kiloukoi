@extends('layout')

@section('title', $announce->exists ? "Éditer une annonce" : "Créer une annonce")

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
        <form class="vstack gap-2" action="{{ route($announce->exists ? 'announce.update' : 'announce.store', ['announce' => $announce]) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method($announce->exists ? 'put' : 'post')

            <div class="row">
                <div class="col-8">
                    <div class="col row">
                        @include('shared.input', ['class' => 'col-4', 'label' => 'titre', 'name' => 'title', 'value' => $announce->title])
                        @include('shared.select', ['class' => 'col-3', 'label' => 'Categories', 'name' => 'categories', 'value' => $announce->categories()->pluck('id'), 'multiple' => true, 'options' => $categories])
                        @include('shared.select', ['class' => 'col-3', 'label' => 'Options', 'name' => 'options', 'value' => $announce->options()->pluck('id'), 'multiple' => true, 'options' => $options])
                        @include('shared.input', ['class' => 'col-2', 'type' => 'number', 'label' => 'prix', 'name' => 'price', 'value' => $announce->price])
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'label' => 'Contenu de l\'annonce', 'name' => 'description', 'value' => $announce->description])
                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'label' => 'adresse', 'name' => 'adress', 'value' => $announce->adress])
                        @include('shared.input', ['class' => 'col', 'label' => 'code postale', 'name' => 'postalcode', 'value' => $announce->postalcode])
                        @include('shared.input', ['class' => 'col', 'label' => 'ville', 'name' => 'city', 'value' => $announce->city])
                    </div>
                    @include('shared.checkbox', ['label' => 'disponible', 'name' => 'availability', 'value' => $announce->availability])
                </div>
                <div class="col">
                    @foreach ($announce->pictures as $picture)
                        <img src="{{ $picture->getUrl() }}" alt="" class="w-100 d-block">
                    @endforeach
                    @include('shared.upload', ['name' => 'pictures', 'label' => 'Images', 'multiple' => true])
                </div>
            </div>
            <div>
                <button class="btn btn-primary">
                    @if ($announce->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>

        </form>
    </div>

@endsection
