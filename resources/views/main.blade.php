@extends('layouts.layout')

@section('content')
    @foreach($posts as $post)
        @component('components.post', compact('post'))@endcomponent
    @endforeach
@endsection