@extends('layouts.layout')

@section('content')
    <div style="margin: 10%">
        @if ($posts)
            @foreach($posts as $post)
                <div style="border: 1px solid; margin-bottom: 20px; padding: 1%">
                    <h3><a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></h3>
                    <h1>
                        {{ $post->image }}
                    </h1>
                    <br>
                    <h4>{{ $post->description }}</h4>
                    <button>Like {{ $post->likes_count() }}</button>
                    <form method="POST" action="/posts/{{ $post->id }}/comment">
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
        @endif
    </div>
@endsection