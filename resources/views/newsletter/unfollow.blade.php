@extends('layout')
@section('title', 'Désabonnement')

@section('content')
    <div class="container-small">
        <div class="row">
            <div class="col c4">
                <h1>Se désabonner</h1>
            </div>
            <div class="col c4">
                <div class="alert alert-warning">
                    Vous êtes sur le point de vous désabonner de notre liste de diffusion. En effectuant cette action, vous ne reçevrais plus d'emails promotionnel de notre part. Êtes vous sûre de vouloir continuer ?
                </div>
                <p>Êtes-vous sûr de vouloir vous désabonner de notre liste de diffusion ?</p>
                <form action="{{ route('newsletter.unfollow.applicate', ['mail' => $mail]) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Oui, je veux me désabonner</button>
                </form>
            </div>
            <div class="col c4">
                <center><img src="{{ asset('images/website/little_man.png') }}" alt="little_man" style="height:50%;"></center>
            </div> 
        </div>
        
    </div>
@endsection

