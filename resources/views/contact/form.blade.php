@extends('layout')

@section('title', 'Contact')

@section('content')
    <div class="container-small">
        <h2>Contact - Signalement de Problème</h2>
        <div class="alert alert-warning">
            <p>Si vous avez rencontré un problème sur notre site, veuillez nous en informer en remplissant le formulaire ci-dessous. Nous prendrons les mesures nécessaires pour résoudre le problème.</p>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Sujet :</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Message :</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection
