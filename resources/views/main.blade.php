@extends('layouts.layout')

@section('content')
    @component('posts', ['posts' => $posts, 'user' => $posts->first()->user])@endcomponent
@endsection