<x-mail::message>
# Inscription sur {{ config('app.name') }}

Email généré automatiquement pour l'administration.

Un nouvel utilisateur viens de s'inscrire sur kiloukoi !

**pseudo** : {{ $data->name }}

**email** : {{ $data->email }}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
