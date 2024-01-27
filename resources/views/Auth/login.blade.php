@extends('layout')

@section('title', 'Connexion')

@section('content')
    <div class="row">
        <div class="col-6" style="position: relative; overflow: hidden; max-height: 100vh;">
            <img src="{{ asset('images/website/bg-login.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="col-4">
            <h1>@yield('title')</h1>

            @include('shared.flash')

            <div class="alert alert-secondary">
                <p>Explorez notre communauté pour louer du matériel entre particuliers. Que vous ayez besoin d'outils, d'équipement sportif, ou d'autres articles, nous facilitons le processus de location.</p>
                <p><center><strong>ou</strong></center></p>
                <p><p>Partagez votre matériel avec notre communauté en proposant des locations. C'est simple et bénéfique :</p></p>
            </div>

            <form action="{{ route('login') }}" method="post" class="vstack gap-3">
                @csrf
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Mot de passe', 'name' => 'password'])
                <div>
                    <button class="btn btn-success">Connexion</button>
                    <a href="{{ route('register') }}">Pas encore inscrit ?</a>
                </div>
            </form>
        </div>

    </div>
@endsection