@php
    $averageRating = $announce->reviews->avg('note');
    $roundedAverage = round($averageRating, 2);

    if ($roundedAverage > 4) {
        $color = "success";
    }
    elseif ($roundedAverage > 2.5 && $roundedAverage < 4) {
        $color = "warning";
    }
    else {
        $color = "danger";
    }
@endphp
@extends('layout')

@section('title', $announce->title)

@section('content')
    <div class="container">
        <h1>{{ $announce->title }}</h1>
        <h5>{{ $announce->postalcode }} - {{ $announce->city }}</h5>
        Avis : <span class="text-{{ $color }}">{{ $roundedAverage }}/5</span> - <a href="#list-reviews">Lire les avis</a>
        <h6>
            Dans
            @foreach ($announce->categories as $category)
            <a href=""><span class="badge rounded-pill text-bg-info">{{ $category->name }}</span></a>
            @endforeach
        </h6>
        <hr>
        <div class="row">
            <div class="col-4">
                <h2>Tarif journalier</h2>
                <div class="text-primary fw-bold" style="font-size:4rem;">{{ $announce->price }}€</div>
            </div>
            <div class="col-4">
                <div id="carousel" class="carousel slide" data-bs-ride="carousel" style="max-width:800px;">
                    <div class="carousel-inner">
                        @foreach ($announce->pictures as $k => $picture)
                            <div class="carousel-item {{ $k == 0 ? 'active' : ''}}">
                                <img src="{{ $picture->getUrl(550, 550) }}" alt="" class="w-100">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
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
            <p>{{ nl2br($announce->description) }}</p>
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
        <div class="mt-4" id="list-reviews">
            <h4>Liste des avis</h4>
            @foreach ($announce->reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->user->name }}</h5>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text"><em><strong>Note :</strong> {{ $review->note }}/5</em></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
