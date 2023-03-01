@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
                {{ $post->author }} | | {{ $post->type->name }}
            </div>
            <div class="card-body">
                <div>
                    @foreach ($post->technologies as $technology)
                        <span class="badge rounded-pill p-3"
                            style="background-color: {{ $technology->bg_color }}; color: {{ $technology->accent_color }}">
                            {{ $technology->name }}
                        </span>
                    @endforeach
                </div>
                <h5 class="card-title">{{ $post->title }}</h5>
                <div class="card-image">
                    @if ($post->isImageUrl())
                        <img src="{{ $post->image }}" alt="image not found" class="img-fluid">
                    @else
                        <img src="{{ asset('STORAGE/' . $post->image) }}" alt="image not found" class="img-fluid">
                    @endif

                </div>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
                <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                {{ $post->date }}
            </div>
        </div>
    </div>
@endsection
