@extends('admin.admin')

@section('title', 'Liste des annonces')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.announce.create') }}" class="btn btn-success">Créer une annonce</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Disponibilité</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announces as $announce)
                <tr>
                    <td>{{ $announce->title }}</td>
                    <td>{{ $announce->price }}€</td>
                    <td>{{ $announce->city }}</td>
                    <td>{{ $announce->avaibility }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.announce.edit', $announce) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('admin.announce.destroy', $announce) }}" method="post">
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

    {{ $announces->links(); }}

@endsection
