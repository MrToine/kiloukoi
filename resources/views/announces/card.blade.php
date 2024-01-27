<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('announce.show', ['slug' => $announce->getSlug(), 'announce' => $announce]) }}">{!! $announce->title !!}</a>
        </h5>
        <p class="card-text">
            le {{ $announce->created_at }} - {{ $announce->postalcode }} - {!! $announce->city !!}
            <div class="text-primary bold" style="font-size:1.4rem;">
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
