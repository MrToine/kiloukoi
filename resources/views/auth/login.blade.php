@extends('layout')

@section('title', 'Connexion')

@section('content')
    <div class="row ">
        <div class="col c2">&nbsp;</div>
        <div class="col c8">
            <h1>@yield('title')</h1>

            @include('shared.flash')

            <div class="alert alert-secondary bg-login">
                <p>Explorez notre communauté pour louer du matériel entre particuliers. Que vous ayez besoin d'outils, d'équipement sportif, ou d'autres articles, nous facilitons le processus de location.</p>
                <p><center><strong>ou</strong></center></p>
                <p>Partagez votre matériel avec notre communauté en proposant des locations. C'est simple et bénéfique</p>
            </div>

            <div class="row">
                <div class="col c3">&nbsp;</div>
                <div class="col c6">
                    <form action="{{ route('login') }}" method="post" class="vstack">
                        @csrf
                        @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                        @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Mot de passe', 'name' => 'password'])
                        @include('shared.checkbox', ['class' => 'col', 'label' => 'Rester connecté lors de mes prochaines visites', 'name' => 'always_connected', 'value' => 1])
                        <div>
                            <button class="btn btn-success">Connexion</button>
                            <a href="{{ route('recuperation_password') }}" class="link-warning">Récupération mot de passe</a>
                        </div>
                    </form>
                    <a href="{{ route('register') }}" class="link-danger">Pas encore inscrit ?</a>
                </div>
            </div>
            
        </div>

    </div>
@endsection
