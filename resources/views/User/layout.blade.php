@extends('layout')

@section('content')
    @include('user.header')
    <div class="container">
        @include('shared.breadcrumb')
    </div>

    @include('shared.flash')

    @yield('user_content')
@endsection
