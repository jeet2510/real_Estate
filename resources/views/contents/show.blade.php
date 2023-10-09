@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Content Details</h2>
        <p><strong>Description For:</strong> {{ $content->description_for }}</p>
        <p><strong>Description:</strong> {{ $content->description }}</p>
        <a href="{{ route('contents.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
