<x-mail::message>
# A propos de votre location en cours

Bonjour {{ $location_request->tenant->name }} !

Ce message concerne l'annonce <strong>{{ $location_request->announce->title }}</strong>. Vous reçevez cette email car l'auteur de l'annonce à <strong>annulé</strong> votre location.

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
