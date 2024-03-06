<div class="card position-relative">
    @if ($user && $user->id == $request->user_id)
        @foreach ($user->locationRequests as $locationRequest)
            @if ($locationRequest->request_id == $request->id)
                <span class="badge position-absolute top-0 end-0 translate-middle @if (!$locationRequest->status) text-bg-danger @else text-bg-success @endif">
                    @if (!$locationRequest->status) Demande en attente @else En location @endif
                </span>
            @endif
        @endforeach
    @endif

    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('announce.request.show', ['slug' => $request->getSlug(), 'request' => $request]) }}">{{ $request->title }}</a>
        </h5>
        <p class="card-text">
            Le {{ $request->created_at->format('d/m/Y') }} - {{ $request->postalcode }} - {!! $request->city !!}
            <div class="text-primary bold" style="font-size: 1.4rem;">
                {{ $request->price }}€
            </div>
        </p>
    </div>
</div>
