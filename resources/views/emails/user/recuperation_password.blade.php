<x-mail::message>
# Inscription sur {{ config('app.name') }}

Bonjour, {{ $data->name }}.

Une demande de récupération de mot de passe a été faite pour votre identifiant. Si ce n'est pas vous, ne pas donner suite à ce message.

Sinon cliquez sur le bouton ci-dessous pour valider votre demande de modification de votre mot de passe.

<x-mail::button :url="route('recuperation_password_check', ['token' => $token])">
Modifier mon mot de passe
</x-mail::button>

Vous pouvez aussi copier-coller le lien suivant :
<a href="{{ route('recuperation_password_check', ['token' => $token]) }}">{{ route('recuperation_password_check', ['token' => $token]) }}</a>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
