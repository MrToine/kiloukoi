@extends('admin.admin')

@section('title', 'Accueil')

@section('content')
<div class="row">
    @foreach ($summaries as $summary)
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    Résumé des {{ Str::ucfirst($summary['title']) }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total {{ Str::ucfirst($summary['title']) }}</h5>
                    <p class="card-text">Il y a <strong>{{ $summary['total'] }}</strong> {{ $summary['title'] }} actives sur le site.</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route($summary['route'] . '.index') }}" class="btn btn-primary">Voir les détails</a>
                        <a href="{{ route($summary['route'] . '.create') }}" class="btn btn-success">Créer</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                Affiliation & Newsletters
            </div>
            <div class="card-body">
                <h5>Total emails affiliés</h5>
                <p>Il y a <strong>{{ $nb_userAffiliate }}</strong> personnes inscrits au newsletters</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.newsletter.index') }}" class="btn btn-primary">Liste des newsletters</a>
                    <a href="{{ route('admin.newsletter.create') }}" class="btn btn-success">Créer un email</a>
                    @if ($maj_newsletter)
                        <a href="{{ route('admin.newsletter_maj') }}" class="btn btn-warning"><i class="fa-solid fa-rotate"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
