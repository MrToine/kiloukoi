<div class="card">
    <div class="card-body">
        <a href="" class="card-link">{{ $request->user->name }}</a>
        <p class="card-text">
            {!! nl2br($request->user->description) !!}
        </p>
    </div>
</div>
