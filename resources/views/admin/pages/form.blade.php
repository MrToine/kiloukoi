@extends('admin.admin')

@section('title', $page->exists ? "Éditer une page" : "Créer une page")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($page->exists ? 'admin.page.update' : 'admin.page.store', ['page' => $page]) }}" method="post">

        @csrf
        @method($page->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'titre', 'name' => 'title', 'value' => $page->title])
        </div>
        <div class="row">
            @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'style' => 'height:400px', 'name' => 'content', 'value' => $page->content])
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($page->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection
