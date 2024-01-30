@if ($announce->check_moderation)
<x-mail::message>
# Information importante concernant votre annonce

Bonjour {{ $announce->user->name }} !

**Annonce** : {{ $announce->title }}

Votre annonce à été validée par la modération. Elle est désormais visible sur le site. Vous pouvez acceder a votre annonce en suivant le lien suivant :

lien

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
@else
<x-mail::message>
# Information importante concernant votre annonce

Bonjour {{ $announce->user->name }} !

**Annonce** : {{ $announce->title }}

Votre annonce n'a malheureusement pas été retenue.

**Raison** : Elle ne correspond pas aux règles.

Pour éviter que votre prochaine annonce ne sois pas retenu, vous pouvez éviter les erreurs courante en suivant le guide du parfait proprio !

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
@endif
