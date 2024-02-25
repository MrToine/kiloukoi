@extends('layout')

@section('title', 'Récupérer mot de passe')

@section('content')
    <div class="row">
        <div class="col-6 d-none d-md-block" style="position: relative; overflow: hidden; max-height: 100vh;">
            <img src="{{ asset('images/website/bg-login.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="col col-md-4">
            <h1>@yield('title')</h1>

            @include('shared.flash')

            <div class="alert alert-secondary">
                <p>Veuillez indiquer votre e-mail pour modifier votre mot de passe.</p>
            </div>
            <form action="{{ route('recuperation_password') }}" method="post" class="vstack gap-3">
                @csrf
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                <div>
                    <button class="btn btn-success">Récupérer</button>
                </div>
            </form>
        </div>

    </div>
@endsection
