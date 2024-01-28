@extends('user.layout')

@section('title', 'Demandes de location')

@section('user_content')
    <div class="container">
        <h2>Mes demandes de location en cours</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre de l'annonce</th>
                    <th>Locataire</th>
                    <th>Discussion</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->locationRequests->where('status', false) as $location_request)
                    <tr>
                        <td><a href="{{ route('announce.show', ['slug' => $location_request->announce->getSlug(), 'announce' => $location_request->announce]) }}">{{ $location_request->announce->title }}</a></td>
                        <td><a href="{{ route('user.profile', ['id' => $location_request->tenant->id]) }}">{{ $location_request->tenant->name }}</a></td>
                        <td><a href="" class="link-info">Accès à la conversation</a></td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <form action="{{ route('account.request.validated', ['location_request' => $location_request]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-success">Valider</button>
                                </form>
                                <form action="{{ route('account.request.destroy', ['location_request' => $location_request]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger">Annuler</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
