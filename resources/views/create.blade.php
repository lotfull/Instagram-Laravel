@extends('layouts.layout')

@section('content')
    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label for="image" class="label">Image</label>
            <input type="file" class="input {{ $errors->has('image') ? 'is-danger' : '' }}" name="image" placeholder="Image" required>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea class="textarea" name="description"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
            </div>
        </div>


        {{--        @include('errors')--}}

    </form>
@endsection