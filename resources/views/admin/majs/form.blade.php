@extends('admin.admin')

@section('title', $maj->exists ? "Éditer une maj" : "Créer une maj")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($maj->exists ? 'admin.maj.update' : 'admin.maj.store', ['maj' => $maj]) }}" method="post">

        @csrf
        @method($maj->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'titre', 'name' => 'title', 'value' => $maj->title])
        </div>
        <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'type', 'name' => 'type', 'value' => $maj->type])
        </div>
        <div class="row">
            @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'style' => 'height:400px', 'name' => 'content', 'value' => $maj->content])
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($maj->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection
