<x-mail::message>
# A propos de votre demande de location

Bonjour {{ $location_request->tenant->name }} !

Ce message concerne l'annonce <strong>{{ $location_request->announce->title }}</strong>. Vous reçevez cette email car l'auteur de l'annonce à <strong>annulé</strong> votre demande.

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
