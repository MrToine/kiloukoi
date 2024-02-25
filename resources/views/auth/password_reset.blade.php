@extends('layout')

@section('title', 'Modifier le mot de passe')

@section('content')
    <div class="row ms-auto">
        <div class="col col-md-4 ms-auto">
            <h1>@yield('title')</h1>
            <div class="alert alert-warning">
                Choisissez un mot de passe fort et unique.
            </div>
            @include('shared.flash')
            <form action="{{ route('recuperation_password_check', ['token' => $token->token]) }}" method="post" class="vstack gap-3">
                @csrf
                @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Nouveau mot de passe', 'name' => 'password'])
                @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Retapez votre mot de passe', 'name' => 'verif_password'])
                <div>
                    <button class="btn btn-success">Modifier mon mot de passe</button>
                </div>
            </form>
        </div>
        <div class="col-6 ms-auto d-none d-md-block" style="position: relative; overflow: hidden; max-height: 100vh;">
            <img src="{{ asset('images/website/bg-register.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>
@endsection
