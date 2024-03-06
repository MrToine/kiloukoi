@extends('admin.admin')

@section('title', 'Liste des annonces')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
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
            @foreach ($requests as $request)
                @if (!$request->check_moderation)
                    @php
                        $style = 'background-color: #FFDCDC;';
                    @endphp
                @else
                    @php
                        $style = '';
                    @endphp
                @endif
                <tr>
                    <td style="{{ $style }}"><a href="{{ route('announce.request.show', ['slug' => $request->getSlug(), 'request' => $request->id]) }}" target="_blank">{{ $request->title }}</a></td>
                    <td style="{{ $style }}">{{ $request->price }}€</td>
                    <td style="{{ $style }}">{{ $request->city }}</td>
                    <td style="{{ $style }}">
                        @if ($request->availability)
                            <strong>Disponible</strong>
                        @else
                            <strong>Non disponible</strong>
                        @endif
                    </td>
                    <td style="{{ $style }}">
                        @if ($request->check_moderation)
                            <a href="{{ route('admin.request.check_moderation', $request) }}" class="btn btn-warning">Refuser</a>
                            <strong><span class="text-success">validée</span></strong>
                        @else
                            <a href="{{ route('admin.request.check_moderation', $request) }}" class="btn btn-success">Valider</a>
                            <strong><span class="text-danger">en attente de validation</span></strong>
                        @endif
                    </td>
                    <td style="{{ $style }}">
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.announce.edit', $request) }}" class="btn btn-primary">Éditer</a>
                            <form action="{{ route('admin.announce.destroy', $request) }}" method="post">
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

    {{ $requests->links(); }}

@endsection
