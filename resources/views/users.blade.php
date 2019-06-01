@extends('layouts.layout')

@section('content')
    <h2>{{ $name }}</h2>
    @foreach($users as $user)
        {{--            <div style="border: 1px solid; margin-bottom: 20px; padding: 1%">--}}
        <h3><a href="/users/{{ $user->id }}">{{ $user->name }}</a></h3>
        {{--            </div>--}}
    @endforeach
@endsection