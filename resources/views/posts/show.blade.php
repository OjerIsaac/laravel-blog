@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <hr>
        <h4>Comments</h4>

        @auth
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="body">Add Comment</label>
                    <textarea name="body" id="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        @endauth

    </div>
@endsection
