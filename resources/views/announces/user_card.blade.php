<div class="card">
    <div class="card-body">
        <a href="" class="card-link">{{ $announce->user->name }}</a>
        <p class="card-text text-small">
            {!! nl2br($announce->user->description) !!}
        </p>
    </div>
</div>
