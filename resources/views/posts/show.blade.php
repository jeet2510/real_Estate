@extends('layouts.app')

@section('content')
    <h1>Post Details</h1>

    <div>
        <strong>Title:</strong> {{ $post->title }}
    </div>
    <div>
        <strong>Description:</strong> {{ $post->description }}
    </div>
    <div>
        <strong>Image:</strong>
        <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 300px;">
    </div>
    <a href="http://127.0.0.1:8000/posts/1/edit" class="btn btn-primary">Edit</a>
@endsection
