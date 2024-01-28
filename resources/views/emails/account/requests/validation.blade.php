<x-mail::message>
# A propos de votre demande de location

Bonjour {{ $location_request->tenant->name }} !

Ce message concerne l'annonce <strong>{{ $location_request->announce->title }}</strong>. Vous reçevez cette email car l'auteur de l'annonce à <strong>accepté</strong> votre demande.

Pour convenir d'un rendez-vous, et pouvoir correspondre plus facilement avec le propriétaire, une messagerie personnelle à été créer. Seul vous et le propriétaire du bien y avait accès.
<x-mail::button :url="''">
Aller à la messagerie
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
