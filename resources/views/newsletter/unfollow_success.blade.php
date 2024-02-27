@extends('layout')
@section('title', 'Désabonnement')

@section('content')
    <div class="container mt-4">
        <div class="row col-md-8 offset-md-2">
            <h1>Se désabonner</h1>
            <div class="alert alert-success">Vous avez bien été désinscris de la liste de diffusion. Si vous souhaitez vous réabonner, vous pouvez le faire dans les paramètres de votre compte utilisateur.</div>
        </div>
        <div class="row col-md-8 offset-md-2">
            <center><img src="{{ asset('images/website/little_man.png') }}" alt="little_man" style="height:50%;"></center>
        </div>
    </div>
@endsection

