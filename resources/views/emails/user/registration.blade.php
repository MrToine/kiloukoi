<x-mail::message>
# Inscription sur {{ config('app.name') }}

Bonjour, {{ $data->name }}.

Bienvenue chez {{ config('app.name') }}

Votre espace personnel à bien été créer. Afin de pouvoir utiliser toutes les fonctionnalités du site, vous devez valider votre inscription.
<x-mail::button :url="route('user.validation_account', ['token' => $data->registration_token])">
Valider le compte
</x-mail::button>

Vous pouvez aussi copier-coller le lien suivant :
{{ route('user.validation_account', ['token' => $data->registration_token]) }}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
