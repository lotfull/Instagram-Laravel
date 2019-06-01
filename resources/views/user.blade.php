@extends('layouts.layout')

@section('content')
    @isset($user)
        <div style="margin: 10%">
            <h1>{{ $user->name }}</h1>
            @if (auth()->user()->id == $user->id)
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
            <h3>{{ $user->description }}</h3>
            <h3>{{ $user->email }}</h3>
            <a href="/users/{{ $user->id }}/followers">Followers ({{ $user->followers()->count() }})</a>
            <a href="/users/{{ $user->id }}/following">Following ({{ $user->following()->count() }})</a>
            @foreach($user->posts() as $post)
                <div style="border: 1px solid; margin-bottom: 20px; padding: 1%">
                    <h3><a href="/{{ $user->id }}">{{ $user->name }}</a></h3>
                    <h1>
                        {{ $post->image }}
                    </h1>
                    <br>
                    <h4>{{ $post->description }}</h4>
                    <form action="/posts/{{ $post->id }}/like" method="post">
                        @csrf
                        <label>{{ $post->likes_count() }}</label>
                        @if (auth()->user()->likes($post))
                            @method('delete')
                            <input type="submit" value="Unlike"/>
                        @else
                            <input type="submit" value="Like"/>
                        @endif
                    </form>
                    <form method="POST" action="/posts/{{ $post->id }}/comment">
                        @csrf
                        <input id="comment" type="text" name="comment" placeholder="Comment">
                        <button type="submit">Send</button>
                    </form>
                    @foreach($post->comments() as $comment)
                        @if ($commented_user = $comment->user()[0])
                            <h4>{{ $commented_user->name }}</h4>
                            <p>{{ $comment->created_at }}: {{ $comment->text }}</p>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    @endisset
@endsection