@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Contents</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Description For</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>{{ $content->description_for }}</td>
                        <td>{{ $content->description }}</td>
                        <td>
                            <a href="{{ route('contents.show', $content->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
