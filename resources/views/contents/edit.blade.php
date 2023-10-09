@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Content</h2>
        <form action="{{ route('contents.update', $content->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="description_for">Description For:</label>
                <input type="text" class="form-control" id="description_for" name="description_for" value="{{ $content->description_for }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $content->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
