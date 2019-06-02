<div style="border: 1px solid; margin-bottom: 20px; padding: 1%">
    <h3><a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></h3>
    <img src="/storage/images/{{ $post->image }}">
    <p>{{ $post->created_at }}</p>
    @if(auth()->id() == $post->user->id)
        <form action="/posts/{{ $post->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Edit Post"/>
        </form>
    @endif
    <br>
    <h4>{{ $post->description }}</h4>
    <label>Likes: {{ $post->likes_count() }}</label>
    @auth
        <form action="/posts/{{ $post->id }}/like" method="post" style="display: inline">
            @csrf
            @if (auth()->user()->likes($post))
                @method('delete')
                <input type="submit" value="Unlike"/>
            @else
                <input type="submit" value="Like"/>
            @endif
        </form>
        <form method="POST" action="/posts/{{ $post->id }}/comment">
            @csrf
            <input id="comment" type="text" name="text" placeholder="Comment">
            <button type="submit">Send</button>
        </form>
    @endauth
    @foreach($post->comments() as $comment)
        @if ($commented_user = $comment->user()[0])
            <h4>{{ $commented_user->name }}</h4>
            <p>{{ $comment->created_at }}: {{ $comment->text }}</p>
        @endif
    @endforeach
</div>
