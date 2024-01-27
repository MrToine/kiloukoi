@extends('layout')

@section('title', $announce->title)

@section('content')
    <div class="container">
        <h1>{{ $announce->title }}</h1>
        <h5>{{ $announce->postalcode }} - {{ $announce->city }}</h5>
        <h6>
            Dans
            @foreach ($announce->categories as $category)
            <a href=""><span class="badge rounded-pill text-bg-info">{{ $category->name }}</span></a>
            @endforeach
        </h6>
        <hr>
        <div class="row">
            <div class="col-8">
                <h2>Tarif journalier</h2>
                <div class="text-primary fw-bold" style="font-size:4rem;">{{ $announce->price }}€</div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        @include('announces.user_card')
                        <h2>Options</h2>
                        <ul class="list-group">
                            @foreach ($announce->options as $option)
                                <li class="list-group-item">{{ $option->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($announce->description) !!}</p>
        </div>

        <hr>
        @guest
            <a href="{{ route('login') }}" class="btn btn-success">Se connecter pour faire une demande de location</a>
        @endguest
        @auth
            <div class="mt-4">
                @include('shared.flash')
                <h4>Demander une location</h4>
                <form class="vstack gap-3" action="{{ route('announce.contact', $announce) }}" method="post">
                    @csrf
                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'firstname'])
                        @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message'])
                    <div>
                        <button class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
        @endauth
    </div>

@endsection
