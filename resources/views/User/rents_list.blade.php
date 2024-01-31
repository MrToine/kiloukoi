@extends('user.layout')

@section('title', 'Liste de mes annonces')

@section('user_content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Liste de mes annonces</h2>
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
                                <td style=""><a href="{{ route('announce.show', ['slug' => $announce->getSlug(), 'announce' => $announce->id]) }}" target="_blank">{{ $announce->title }}</a></td>
                                <td style="">{{ $announce->price }}€</td>
                                <td style="">{{ $announce->city }}</td>
                                <td style="">
                                    @if ($announce->availability)
                                        <strong>Disponible</strong>
                                    @else
                                        <strong>Non disponible</strong>
                                    @endif
                                </td>
                                <td style="">
                                    <div class="d-flex gap-2 w-100 justify-content-end">
                                        <form action="{{ route('announce.destroy', ['announce' => $announce]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                        <a class="btn btn-warning" href="{{ route('announce.edit', ['announce' => $announce]) }}">Modifier</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('user.gestion_bar')
        </div>
    </div>
@endsection

