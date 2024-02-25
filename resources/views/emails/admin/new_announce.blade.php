<x-mail::message>
# Nouvelle announce sur {{ config('app.name') }}

Email généré automatiquement pour l'administration.

Une nouvelle annonce est disponible sur kiloukoi !

**Titre** : {{ $data->title }}

**auteur** : {{ $data->user->name }}

<x-mail::button :url="route('admin.announce.index')">
Valider l'annonce
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
