<x-mail::message>
# Nouvelle demande sur {{ config('app.name') }}

Email généré automatiquement pour l'administration.

Une nouvelle demande d'annonce est disponible sur kiloukoi !

**Titre** : {{ $data->title }}

**auteur** : {{ $data->user->name }}

<x-mail::button :url="route('admin.request.index')">
Valider la demande
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
