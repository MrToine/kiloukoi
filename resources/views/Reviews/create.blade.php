@extends('layout')

@section('title', 'Votre avis compte !')

@section('content')

<div class="container mt-4">
    <h1>@yield('title')</h1>
    <div class="alert alert-warning">
        Le système de notes et d'avis est essentiel pour améliorer constamment la qualité du service. Vos retours sont cruciaux car ils aident à instaurer la confiance entre les utilisateurs et à prendre des décisions éclairées. En partageant vos expériences, vous contribuez à récompenser l'excellence, à résoudre rapidement les problèmes et à créer une communauté engagée. Votre participation active est la clé pour assurer un environnement positif et professionnel sur la plateforme, bénéficiant à tous les membres.
    </div>
    <div class="row">
        <div class="col-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    Concernant l'annonce <strong>{{ $announce->title }}</strong>
                </div>
                <div class="card-body bg-white">
                    <strong>Propriétaire: </strong>{{ $announce->user->name }}
                    <form class="vstack gap-2" action="{{ route('reviews.store') }}" method="post">

                        @csrf
                        @method('post')

                        <div class="row mt-2">
                            <div class="col row">
                                <div class="col">
                                    Attribuez une note générale sur le service offert
                                </div>
                                @include('shared.input', [
                                    'type' => 'number',
                                    'class' => 'col align-self-start',
                                    'name' => 'note',
                                    'placeholder' => 'entre 1 et 5'
                                ])
                            </div>
                        </div>
                        @include('shared.input', [
                            'type' => 'textarea',
                            'class' => 'col',
                            'label' => 'commentaire',
                            'name' => 'comment'
                        ])
                        <div class="alert alert-info">
                            Donnez nous votre avis sur la location. Comment cela s'est-il passé ? Recommanderiez-vous au utilisateurs ce bien ? Quel sont les avantages et inconvéniants ? <br>Soyez le plus précis possible.
                        </div>
                        <button class="btn btn-primary">Envoyer mon avis</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
