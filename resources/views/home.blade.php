@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <hr>

                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</h6>
                                    <p class="card-text">{{ Str::limit($post->body, 150) }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="card-link">Read More</a>
                                </div>
                            </div>
                        @endforeach

                        {{ $posts->links() }}
                    @else
                        <p>No posts available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
