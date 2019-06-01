@extends('layouts.layout')

@section('content')
    <form method="POST" action="/users/{{ auth()->user()->id }}">
        @csrf
        @method('patch')

        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name"
                       placeholder="Name" value="{{ auth()->user()->name }}" required>
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                          required>{{ auth()->user()->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Edit Project</button>
            </div>
        </div>

    </form>
    <div style="margin: 10%">
        <h1>{{ $user->name }}</h1>

        @endforeach
    </div>
@endsection