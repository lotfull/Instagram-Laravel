@foreach($posts as $post)
    <div style="border: 1px solid; margin-bottom: 20px; padding: 1%">
        <h3><a href="/users/{{ $user->id }}">{{ $user->name }}</a></h3>
        <img src="/storage/images/{{ $post->image }}">
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
            <input id="comment" type="text" name="text" placeholder="Comment">
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
