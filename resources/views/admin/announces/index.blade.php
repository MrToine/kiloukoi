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
                <td></td>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announces as $announce)
                @if (!$announce->check_moderation)
                    @php
                        $style = 'background-color: #FFDCDC;';
                    @endphp
                @else
                    @php
                        $style = '';
                    @endphp
                @endif
                <tr>
                    <td style="{{ $style }}"><a href="{{ route('announce.show', ['slug' => $announce->getSlug(), 'announce' => $announce->id]) }}" target="_blank">{{ $announce->title }}</a></td>
                    <td style="{{ $style }}">{{ $announce->price }}€</td>
                    <td style="{{ $style }}">{{ $announce->city }}</td>
                    <td style="{{ $style }}">
                        @if ($announce->availability)
                            <strong>Disponible</strong>
                        @else
                            <strong>Non disponible</strong>
                        @endif
                    </td>
                    <td style="{{ $style }}">
                        @if ($announce->check_moderation)
                            <a href="{{ route('admin.announce.check_moderation', $announce) }}" class="btn btn-warning">Refuser</a>
                            <strong><span class="text-success">validée</span></strong>
                        @else
                            <a href="{{ route('admin.announce.check_moderation', $announce) }}" class="btn btn-success">Valider</a>
                            <strong><span class="text-danger">en attente de validation</span></strong>
                        @endif
                    </td>
                    <td style="{{ $style }}">
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.announce.edit', $announce) }}" class="btn btn-primary">Éditer</a>
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
