<x-mail::message>
# Demande de location

Vous avez un client potentiel pour l'annonce <a href="{{ route('announce.show', ['slug' => $announce->getSlug(), 'announce' => $announce]) }}">{{ $announce->title }}</a> !

**Prénom :** {{ $data['firstname'] }}

**objet du message :**
{{ $data['message'] }}


Vous pouvez valider la demande en cliquant sur le bouton ci-dessous. **Attention** ! Sans nouvelles de votre part dans les prochaines 48h, la demande est annulé.
<x-mail::button :url="''">
Valider la demande
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
