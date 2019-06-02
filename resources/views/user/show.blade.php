@extends('layouts.layout')

@section('content')
    <h1>{{ $user->name }}</h1>
    @auth
        @if (auth()->id() == $user->id)
            <form action="/users/{{ $user->id }}/edit" method="get">
                @csrf
                <input type="submit" value="Edit Profile"/>
            </form>
        @else
            <form action="/users/{{ $user->id }}/follow" method="post">
                @csrf
                @if (auth()->user()->follows($user))
                    @method('delete')
                    <input type="submit" value="Unfollow"/>
                @else
                    <input type="submit" value="Follow"/>
                @endif
            </form>
        @endif
    @endauth
    <h3>{{ $user->description }}</h3>
    <h3>{{ $user->email }}</h3>
    <a href="/users/{{ $user->id }}/followers">Followers ({{ $user->followers()->count() }})</a>
    <a href="/users/{{ $user->id }}/following">Following ({{ $user->following()->count() }})</a>
    @foreach($user->posts() as $post)
        @component('components.post', compact('post'))@endcomponent
    @endforeach
@endsection