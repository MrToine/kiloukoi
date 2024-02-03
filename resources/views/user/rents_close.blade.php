@extends('user.layout')

@section('title', 'Mes locations')

@section('user_content')

    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Mes locations en cours</h2>
                <div class="alert alert-warning">
                    <p><strong>Attention ! </strong> Ne mettez fin à la location que si vous avez récupérer votre bien et que vous avez régler tout les détails avec le locataire.</p>
                    <p>Bientôt, mettre fin à la location désactivera aussi la messagerie privée. Il ne sera plus possible d'accéder à l'historique de vos messages par la suite.</p>
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
                        @foreach ($announces as $request)
                            <tr>
                                <td style=""><a href="{{ route('announce.show', ['slug' => $request->announce->getSlug(), 'announce' => $request->announce->id]) }}" target="_blank">{{ $request->announce->title }}</a></td>
                                <td style="">{{ $request->announce->price }}€</td>
                                <td style="">{{ $request->announce->city }}</td>
                                <td style="">
                                    @if ($request->announce->availability)
                                        <strong>Disponible</strong>
                                    @else
                                        <strong>Non disponible</strong>
                                    @endif
                                </td>
                                <td style="">
                                    <div class="d-flex gap-2 w-100 justify-content-end">
                                        <form action="{{ route('account.request.destroy', ['location_request' => $request]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            @include('Shared.input', ['type' => 'hidden', 'name' => 'location_type', 'value' => 'end'])
                                            <button class="btn btn-warning">Annuler la location</button>
                                        </form>
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
