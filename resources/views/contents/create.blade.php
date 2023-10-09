@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Content</h2>
        <form action="{{ route('contents.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description_for">Description For:</label>
                <input type="text" class="form-control" id="description_for" name="description_for" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
