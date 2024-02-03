@extends('admin.admin')

@section('title', $announce->exists ? "Éditer une annonce" : "Créer une annonce")

@section('content')
    <div class="container">
        <h1 class="mt-4">@yield('title')</h1>
        <form action="{{ route($announce->exists ? 'admin.announce.update' : 'admin.announce.store', ['announce' => $announce]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($announce->exists ? 'put' : 'post')

            <div class="row">
                <div class="col-md-8">
                    <div class="row mb-3">
                        @include('shared.input', ['class' => 'col-md-6', 'label' => 'titre', 'name' => 'title', 'value' => $announce->title])
                        @include('shared.select', ['class' => 'col-md-6', 'label' => 'Categories', 'name' => 'categories', 'value' => $announce->categories()->pluck('id'), 'multiple' => true, 'options' => $categories])
                    </div>
                    <div class="row mb-3">
                        @include('shared.select', ['class' => 'col-md-6', 'label' => 'Options', 'name' => 'options', 'value' => $announce->options()->pluck('id'), 'multiple' => true, 'options' => $options])
                        @include('shared.input', ['class' => 'col-md-6', 'type' => 'number', 'label' => 'prix', 'name' => 'price', 'value' => $announce->price])
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'class' => 'mb-3', 'label' => 'Contenu de l\'annonce', 'name' => 'description', 'value' => $announce->description])
                    <div class="row mb-3">
                        @include('shared.input', ['class' => 'col-md-4', 'label' => 'adresse', 'name' => 'adress', 'value' => $announce->adress])
                        @include('shared.input', ['class' => 'col-md-4', 'label' => 'code postale', 'name' => 'postalcode', 'value' => $announce->postalcode])
                        @include('shared.input', ['class' => 'col-md-4', 'label' => 'ville', 'name' => 'city', 'value' => $announce->city])
                    </div>
                    @include('shared.checkbox', ['label' => 'disponible', 'name' => 'availability', 'value' => $announce->availability])
                </div>

                <div class="col-md-4">
                    @foreach ($announce->pictures as $picture)
                        <div id="picture{{ $picture->id }}" class="position-relative mb-3">
                            <img src="{{ $picture->getUrl() }}" alt="" class="w-100 d-block">
                            <button class="button-delete position-absolute w-100 bottom-0 start-0" type="button"
                                hx-delete="{{ route('account.picture.destroy', $picture->id) }}"
                                hx-target="#picture{{ $picture->id }}"
                                hx-swap="delete"
                            >
                                Supprimer
                                <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    @endforeach
                    @include('shared.upload', ['name' => 'pictures', 'label' => 'Images', 'multiple' => true])
                </div>
            </div>

            <div class="mt-2">
                <button class="btn btn-primary" type="submit">
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
