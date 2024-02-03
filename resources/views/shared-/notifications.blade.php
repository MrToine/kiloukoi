@php
    $notifications = 0;

    if (auth()->check()) {
        $unreadMessages = auth()->user()->unreadMessagesCount();
        $unreadContactAnnounce = auth()->user()->locationRequests->where('status', false)->count();

        $notifications = $unreadMessages + $unreadContactAnnounce;
    }
@endphp

@if ($notifications > 0)
    <span class="badge text-bg-danger">{{ $notifications }}</span>
@endif
