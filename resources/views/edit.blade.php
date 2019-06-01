@extends('layouts.layout')

@section('content')
    <form method="POST" action="/users/{{ auth()->id() }}">
        @csrf
        @method('patch')

        <div class="field">
            <label for="title" class="label">Name</label>
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
                <button type="submit" class="button is-link">Edit Profile</button>
            </div>
        </div>
@endsection