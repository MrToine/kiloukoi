@extends('admin.admin')

@section('title', 'Liste des Majs')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.maj.create') }}" class="btn btn-success">Créer une maj</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majs as $maj)
                <tr>
                    <td>{{ $maj->title }} du {{ $maj->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.maj.edit', $maj) }}" class="btn btn-primary">Éditer</a>
                            <form action="{{ route('admin.maj.destroy', $maj) }}" method="post">
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

    {{ $majs->links(); }}

@endsection
