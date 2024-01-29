@php
    $unreadMessages = 0;
    if (auth()->check()) {
        $unreadMessages = auth()->user()->unreadMessagesCount();
    }
@endphp

@if ($unreadMessages > 0)
    <span class="badge text-bg-danger">{{ $unreadMessages }}</span>
@endif
