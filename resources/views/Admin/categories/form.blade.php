@extends('admin.admin')

@section('title', $category->exists ? "Éditer une categorie" : "Créer une categorie")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store', ['category' => $category]) }}" method="post">

        @csrf
        @method($category->exists ? 'put' : 'post')

        <div class="row d-flex">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom de la categorie', 'name' => 'name', 'value' => $category->name])
            <div class="col row">
                <button class="col btn btn-primary">
                    @if ($category->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </div>

    </form>
@endsection
