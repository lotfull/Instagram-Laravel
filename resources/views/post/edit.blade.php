@extends('layouts.layout')

@section('content')
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('patch')

        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                          required>{{ $post->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Edit Post</button>
            </div>
        </div>
    </form>
@endsection