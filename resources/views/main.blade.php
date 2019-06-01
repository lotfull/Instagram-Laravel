@extends('layouts.layout')

@section('content')
    @foreach($posts as $post)
        @component('post', compact('post'))@endcomponent
    @endforeach
@endsection