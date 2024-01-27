@extends('admin.admin')

@section('title', $announce->exists ? "Éditer une annonce" : "Créer une annonce")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($announce->exists ? 'admin.announce.update' : 'admin.announce.store', ['announce' => $announce]) }}" method="post">

        @csrf
        @method($announce->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'titre', 'name' => 'title', 'value' => $announce->title])
            <div class="col row">
                @include('shared.select', ['class' => 'col', 'label' => 'Categories', 'name' => 'categories', 'value' => $announce->categories()->pluck('id'), 'multiple' => true, 'options' => $categories])
                @include('shared.select', ['class' => 'col', 'label' => 'Options', 'name' => 'options', 'value' => $announce->options()->pluck('id'), 'multiple' => true, 'options' => $options])
                @include('shared.input', ['class' => 'col', 'type' => 'number', 'label' => 'prix', 'name' => 'price', 'value' => $announce->price])
            </div>
        </div>
        @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'description', 'value' => $announce->description])
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'adresse', 'name' => 'adress', 'value' => $announce->adress])
            @include('shared.input', ['class' => 'col', 'label' => 'code postale', 'name' => 'postalcode', 'value' => $announce->postalcode])
            @include('shared.input', ['class' => 'col', 'label' => 'ville', 'name' => 'city', 'value' => $announce->city])
        </div>
        @include('shared.checkbox', ['label' => 'disponible', 'name' => 'availability', 'value' => $announce->availability])

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
@endsection
