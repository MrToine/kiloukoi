<div class="card">
    <div class="card-body">
        <a href="" class="card-link">{{ $announce->user->name }}</a>
        <p class="card-text">
            {!! nl2br($announce->user->description) !!}
        </p>
    </div>
</div>
