@if ($announceRequest->check_moderation)
<x-mail::message>
# Information importante concernant votre annonce

Bonjour {{ $announceRequest->user->name }} !

**Annonce** : {{ $announceRequest->title }}

Votre demande à été validée par la modération. Elle est désormais visible sur le site. Vous pouvez acceder à votre demande en suivant le lien suivant :

lien

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
@else
<x-mail::message>
# Information importante concernant votre demande

Bonjour {{ $announceRequest->user->name }} !

**Annonce** : {{ $announceRequest->title }}

Votre demande n'à malheureusement pas été retenue.

**Raison** : Elle ne correspond pas aux règles.

Pour éviter que votre prochaine demande ne sois pas retenu, vous pouvez éviter les erreurs courante en lisant <a href="{{ route('website.index') }}/pourquoi-mon-annonce-est-refusee">comment bien créer une annonce</a> !

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
@endif
