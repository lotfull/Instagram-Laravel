@extends('layouts.layout')

@section('content')
    <div style="margin: 10%">
        <h3>{{ $name }}</h3>
        @foreach($users as $user)
{{--            <div style="border: 1px solid; margin-bottom: 20px; padding: 1%">--}}
                <h3><a href="/users/{{ $user->id }}">{{ $user->name }}</a></h3>
{{--            </div>--}}
        @endforeach
    </div>
@endsection