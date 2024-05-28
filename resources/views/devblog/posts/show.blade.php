@extends('layout')

@section('title', ucfirst("Devblog"))

@section('content')
    <div class="container-small">
        <div class="bg-img-majlist">
            <img src="{{ asset('images/website/logo_lg.png') }}" alt="Logo" style="height: 150px;" class="mb-2">
        </div>
        <h1>
            DevBlog : {{ $post->name }}
            <div class="float-end"><span class="text-small text-primary">créer le {{ $post->created_at->format('d/m/Y') }}</span></div>
        </h1>
        <div class="">
            {!! $post->content !!}
        </div>
    </div>
@endsection
