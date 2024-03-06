@extends('admin.admin')

@section('title', 'Liste des newsletter')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.newsletter.create') }}" class="btn btn-success">Créer une newsletter</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsletters as $newsletter)
                <tr>
                    <td>{{ $newsletter->title }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.newsletter.edit', $newsletter) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('admin.newsletter.destroy', $newsletter) }}" method="post">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="{{ route('admin.newsletter.send', $newsletter) }}" class="btn btn-success">Envoyer</a>
                            <a href="{{ route('admin.newsletter.send_test', $newsletter) }}" class="btn btn-dark">Email de test</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $newsletters->links(); }}

@endsection
