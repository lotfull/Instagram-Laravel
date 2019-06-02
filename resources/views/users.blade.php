@extends('layouts.layout')

@section('content')
    <h2>{{ $name }}</h2>
    @foreach($users as $user)
        <h3><a href="/users/{{ $user->id }}">{{ $user->name }}</a></h3>
    @endforeach
@endsection