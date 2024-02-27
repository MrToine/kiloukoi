@extends('admin.admin')

@section('title', $newsletter->exists ? "Éditer une newsletter" : "Créer une newsletter")

@section('content')
    <div class="container">
        <h1 class="mt-4">@yield('title')</h1>
        <form action="{{ route($newsletter->exists ? 'admin.newsletter.update' : 'admin.newsletter.store', ['newsletter' => $newsletter]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($newsletter->exists ? 'put' : 'post')

            <div class="row">
                <div class="col-md-8">
                    @include('shared.input', ['class' => 'col-md-6', 'label' => 'titre', 'name' => 'title', 'value' => $newsletter->title])
                    @include('shared.input', ['type' => 'hidden', 'name' => 'template', 'value' => 'default'])
                    @include('shared.input', ['type' => 'textarea', 'class' => 'mb-3', 'label' => 'Contenu de la newsletter', 'name' => 'content', 'value' => $newsletter->description])
                </div>
            </div>

            <div class="mt-2">
                <button class="btn btn-primary" type="submit">
                    @if ($newsletter->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
