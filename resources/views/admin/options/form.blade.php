@extends('admin.admin')

@section('title', $option->exists ? "Éditer une option" : "Créer une option")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option]) }}" method="post">

        @csrf
        @method($option->exists ? 'put' : 'post')

        <div class="row d-flex">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom de l\'option', 'name' => 'name', 'value' => $option->name])
            <div class="col row">
                <button class="col btn btn-primary">
                    @if ($option->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </div>

    </form>
@endsection
