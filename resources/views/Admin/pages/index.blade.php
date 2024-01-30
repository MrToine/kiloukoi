@extends('admin.admin')

@section('title', 'Liste des Pages')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.page.create') }}" class="btn btn-success">Créer une page</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td><a href="{{ route('page.show', ['slug' => $page->getSlug()]) }}" target="_blank">{{ $page->title }}</a></td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.page.edit', $page) }}" class="btn btn-primary">Éditer</a>
                            <form action="{{ route('admin.page.destroy', $page) }}" method="post">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pages->links(); }}

@endsection
