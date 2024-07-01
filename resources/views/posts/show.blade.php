@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <hr>
        <h4>Comments</h4>
        @foreach ($post->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">By {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</h6>
                    <p class="card-text">{{ $comment->body }}</p>
                </div>
            </div>
        @endforeach

        @auth
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
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
