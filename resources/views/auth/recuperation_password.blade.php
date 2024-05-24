@extends('layout')

@section('title', 'Récupérer mot de passe')

@section('content')
    <div class="row">
        <div class="col c4">&nbsp;</div>
        <div class="col c4">
            <h1>@yield('title')</h1>

            @include('shared.flash')

            <div class="alert alert-info">
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
