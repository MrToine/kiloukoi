@extends('layout')

@section('content')
    @include('user.header')

    @include('shared.flash')

    @yield('user_content')
@endsection
