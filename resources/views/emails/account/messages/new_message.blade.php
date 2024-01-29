<x-mail::message>
# Vous avez un nouveau message !

Bonjour {{ $request['user']->name; }} !

Ce message concerne l'annonce **{{ $request['announce']->title; }}**.
Vous reçevez cette email car un nouveau message vous à été envoyé.

**Expediteur: **{{ $request['privateMessage']->user->name; }}

**Contenu du message: **
{{ $request['privateMessage']->message; }}

Vous pouvez accéder à votre boite de messages en suivant le lien suivant :
<a href="{{ route('account.messages.show', ['announce_id' => $request['announce']->id]) }}">{{ route('account.messages.show', ['announce_id' => $request['announce']->id]) }}</a>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
