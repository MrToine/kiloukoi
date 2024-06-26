@extends('user.layout')

@section('title', 'Mes Annonces')

@section('user_content')
    <div class="container">
        <div class="row centered">
            <div class="col c4">&nbsp;</div>
            <div class="col c4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Boîte de Messages pour {{ $private_box->announce->title }}</h5>
                    </div>
                    <div class="card-body bg-light">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Expéditeur:</strong> kiloukoi
                                <span class="float-end"></span>
                                <p class="text-secondary">Voici votre boite de messagerie privée conçernant l'annonce <a href="{{ route('announce.show', ['slug' => $private_box->announce->getSlug(), 'announce' => $private_box->announce]) }}">{!! $private_box->announce->title !!}</a>. Merci de rester courtois dans vos échanges. En cas de litige, vous pouvez nous contacter en suivant le lien : <a href="">Contact</a></p>
                            </li>
                            @foreach ($messages as $message)
                                <li class="list-group-item">
                                    <strong>Expéditeur:</strong> {{ $message->user->name }}
                                    <span class="float-end">{{ \Carbon\Carbon::parse($message->created_at)->isoFormat('DD MMM YYYY à HH:mm') }}</span>
                                    <p class="text-secondary mt-2">{!! nl2br($message->message) !!}</p>
                                </li>
                            @endforeach
                        </ul>

                        <form action="{{ route('account.messages.store', ['box_id' => $private_box->id]) }}" method="post" class="mt-3">
                            <div class="mb-3">
                                @csrf
                                @include('shared.input', ['type' => 'textarea', 'name' => 'message', 'style' => 'width:357px;height60px;'])
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
