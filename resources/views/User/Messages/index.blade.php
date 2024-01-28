@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <h2>Liste des messages</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre de l'annonce</th>
                    <th>Proprietaire</th>
                    <th>Participant</th>
                    <th>dernier message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($private_boxes as $private_box)
                    <tr>
                        <td><a href="{{ route('account.messages.show', ['announce_id' => $private_box->announce->id]) }}" class="link-primary">{{ $private_box->announce->title }}</a></td>
                        <td>{{ $private_box->owner->name }}</td>
                        <td>{{ $private_box->tenant->name }}</td>
                        <td>{{ $private_box->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
