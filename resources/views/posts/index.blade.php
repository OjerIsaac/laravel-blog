@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</h6>
                    <p class="card-text">{{ Str::limit($post->body, 150) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="card-link">Read More</a>

                    @auth
                        @if(auth()->user()->id === $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection
