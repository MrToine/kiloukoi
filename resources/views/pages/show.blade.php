@extends('layout')

@section('title', ucfirst($page->title))

@section('content')
    <div class="container mt-4">
        <div class="row col-md-8 offset-md-2">
            <h1>{{ ucfirst($page->title) }}</h1>
        </div>
        <div class="row col-md-8 offset-md-2">
            {!! ($page->content) !!}
        </div>
    </div>
@endsection
