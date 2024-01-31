<x-mail::message>
# A propos de votre location en cours

Bonjour {{ $location_request->tenant->name }} !

Ce message concerne l'annonce <strong>{{ $location_request->announce->title }}</strong>. Vous reçevez cette email car l'auteur de l'annonce à <strong>mis un terme</strong> à votre location.

**Votre avis compte énormément pour nous**

Afin de satsifaire les clients un maximum, nous mettons en place un système de notation. Il est très important pour nous et pour les utilisateurs de kiloukoi car il permet de garder un service de qualité.
Qu'avez-vous pensé de votre dernière location ?</em>
<x-mail::button :url="route('reviews.create', ['announce' => $location_request->announce, 'token' => $token])">
Noter le propriétaire
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
