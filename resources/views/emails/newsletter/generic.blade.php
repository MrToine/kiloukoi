<x-mail::message>
# {{ $newsletter->title }}

{{ $newsletter->content }}

<small>
    <center><a href="{{ route('newsletter.unfollow', ['mail' => $mail]) }}">Se désabonner</a></center>
</small>
</x-mail::message>
