<x-mail::message>
# {{ $request->subject }}

**Prénom** : {{ $request->name }}

**email** : {{ $request->email }}

**Message** :

{{ $request->description }}

</x-mail::message>
