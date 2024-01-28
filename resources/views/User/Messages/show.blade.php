@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Boîte de Messages pour {{ $private_box->announce->title }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($messages as $message)
                                <li class="list-group-item">
                                    <strong>Expéditeur:</strong> {{ $message->privateMessage->name }}
                                    <span class="float-end">{{ \Carbon\Carbon::parse($message->created_at)->isoFormat('DD MMM YYYY à HH:mm') }}</span>
                                    <p class="text-secondary mt-2">{!! nl2br($message->message) !!}</p>
                                </li>
                            @endforeach
                        </ul>

                        <form action="#" method="post" class="mt-3">
                            <div class="mb-3">
                                <label for="messageContent" class="form-label">Nouveau Message:</label>
                                <textarea class="form-control" id="messageContent" name="messageContent" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
