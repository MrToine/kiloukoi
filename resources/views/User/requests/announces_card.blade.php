<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('announce.show', ['slug' => $rent->announce->getSlug(), 'announce' => $rent->announce]) }}">{{ $rent->announce->title }}</a>
        </h5>
        <p class="card-text">
            le {{ $rent->announce->created_at }} - {{ $rent->announce->postalcode }} - {!! $rent->announce->city !!}
            <div class="text-primary bold" style="font-size:1.4rem;">
                {{ $rent->announce->price }}€
            </div>
            <div class="row">
                <div class="col">
                    @foreach ($rent->announce->categories as $category)
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
