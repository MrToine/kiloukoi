@php
    $notification = 0;
    if (auth()->check() && auth()->user()->locationRequests) {
        $notification = auth()->user()->locationRequests->where('status', false)->count();
    }
@endphp

@if ($notification > 0)
    <span class="badge text-bg-danger">{{ $notification }}</span>
@endif
