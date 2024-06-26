@extends('layout')

@section('title', 'Inscription')

@section('content')
<div class="row">
        <div class="col c2">&nbsp;</div>
        <div class="col c8">
            <h1>@yield('title')</h1>
            <div class="alert alert-secondary bg-login">
                <p>Explorez notre communauté pour louer du matériel entre particuliers. Que vous ayez besoin d'outils, d'équipement sportif, ou d'autres articles, nous facilitons le processus de location.</p>
                <p><center><strong>ou</strong></center></p>
                <p><p>Partagez votre matériel avec notre communauté en proposant des locations. C'est simple et bénéfique :</p></p>
            </div>
            @include('shared.flash')
            <div class="row">
                <div class="col c3">&nbsp;</div>
                <div class="col c6">
                    <form action="{{ route('register') }}" method="post" class="vstack gap-3">
                        @csrf
                        @include('shared.input', ['type' => 'text', 'class' => 'col', 'label' => 'Pseudo', 'name' => 'name'])
                        @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                        @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Mot de passe', 'name' => 'password'])
                        @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Retapez votre mot de passe', 'name' => 'verif_password'])
                        <p class="text-important">En vous inscrivant, vous acceptez les <a href="/conditions-generales-dutilisation">CGU</a> et la <a href="/politique-de-confidentialite">politique de confidentialité</a></p>
                        <div>
                            <button class="btn btn-success">Inscription</button>
                            <a href="{{ route('login') }}" class="link-secondary">Déja un compte ?</a>
                        </div>
                    </form>
                </div>
            </div>
                
        </div>
    </div>
    <div class="row">
        <div class="col c6">
            <div class="container bg-loupe">
                <h2>Chercher une location</h2>

                <ol>
                    <li><strong>Inscrivez-vous :</strong> Créez un compte gratuit pour accéder à notre communauté de location.</li>
                    <li><strong>Parcourez les annonces :</strong> Explorez une variété d'annonces pour trouver le matériel dont vous avez besoin.</li>
                    <li><strong>Contactez le propriétaire :</strong> Une fois que vous avez trouvé ce dont vous avez besoin, contactez le propriétaire pour discuter des détails de la location.</li>
                    <li><strong>Réservez et payez en ligne :</strong> Sécurisez votre location en effectuant le paiement en ligne.</li>
                    <li><strong>Rencontrez-vous :</strong> Organisez un lieu et une heure de rendez-vous avec le propriétaire pour récupérer le matériel.</li>
                    <li><strong>Profitez de votre location :</strong> Utilisez le matériel en toute confiance, sachant que notre plateforme facilite le processus de location de manière transparente et sécurisée.</li>
                </ol>
                <p>Rejoignez notre plateforme dès aujourd'hui et découvrez la facilité de louer du matériel tout en contribuant à une économie collaborative et durable !</p>
            </div>
        </div>
        <div class="col c6">
            <div class="container bg-louer">
                <h2>Louer</h2>

                <ol>
                    <li><strong>Inscrivez-vous :</strong> Créez un compte gratuit pour commencer à proposer des locations.</li>
                    <li><strong>Créez une annonce :</strong> Ajoutez les détails de votre matériel, des photos attrayantes et fixez un tarif de location raisonnable.</li>
                    <li><strong>Communiquez avec les locataires :</strong> Soyez réactif aux demandes de location et répondez aux questions des locataires potentiels.</li>
                    <li><strong>Finalisez la réservation :</strong> Une fois qu'un locataire est intéressé, discutez des détails, convenez d'un lieu et d'une heure pour la remise du matériel.</li>
                    <li><strong>Profitez du partage :</strong> Gagnez de l'argent tout en contribuant à une communauté de partage responsable et durable.</li>
                </ol>

                <p>Rejoignez-nous dès maintenant et commencez à proposer vos locations !</p>
            </div>
        </div>
    </div>
@endsection
