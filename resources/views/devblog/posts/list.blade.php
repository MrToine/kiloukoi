@extends('layout')

@section('title', ucfirst("Devblog"))

@section('content')
    <div class="container-small">
        <div class="bg-img-majlist">
            <img src="{{ asset('images/website/logo_lg.png') }}" alt="Logo" style="height: 150px;" class="mb-2">
        </div>
        <h1>DevBlog</h1>
        @if($count_posts > 0)
            <div class="row">
                @foreach($posts as $post)
                    <div class="col c6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $post->name }}</h5>
                                <div class="text-small text-primary">le {{ $post->created_at->format('d/m/Y') }}</div>
                            </div>
                            <div class="card-body">
                                {!! \Illuminate\Support\Str::limit($post->content, 200, $end='...') !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                Aucun post devblog disponible.
            </div>
        @endif
    </div>
@endsection
