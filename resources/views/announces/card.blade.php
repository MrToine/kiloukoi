<div class="card position-relative">
    @if ($user && $user->id == $announce->user_id)
        @foreach ($user->locationRequests as $locationRequest)
            @if ($locationRequest->announce_id == $announce->id)
                <span class="badge position-absolute top-0 end-0 translate-middle @if (!$locationRequest->status) text-bg-danger @else text-bg-success @endif">
                    @if (!$locationRequest->status) Demande en attente @else En location @endif
                </span>
            @endif
        @endforeach
    @endif

    @if ($announce->getFirstPicture())
        <img src="{{ $announce->getFirstPicture()->getUrl(360, 230) }}" alt="{{ $announce->title }}" class="w-100">
    @endif

    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('announce.show', ['slug' => $announce->getSlug(), 'announce' => $announce]) }}">{{ $announce->title }}</a>
        </h5>
        <p class="card-text">
            Le {{ $announce->created_at->format('d/m/Y') }} - {{ $announce->postalcode }} - {!! $announce->city !!}
            <div class="text-primary bold" style="font-size: 1.4rem;">
                {{ $announce->price }}€
            </div>
            <div class="row">
                <div class="col">
                    @foreach ($announce->categories as $category)
                        <span class="badge rounded-pill text-bg-info">{{ $category->name }}</span>
                    @endforeach
                </div>
                <div class="col">
                    0 avis
                </div>
            </div>
        </p>
    </div>
</div>
