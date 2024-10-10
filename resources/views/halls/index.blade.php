@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halls</h1>
    <a href="{{ route('halls.create') }}" class="btn btn-primary">Add Hall</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($halls as $hall)
                <tr>
                    <td>{{ $hall->name }}</td>
                    <td>{{ $hall->capacity }}</td>
                    <td>
                        <a href="{{ route('halls.show', $hall->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('halls.edit', $hall->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('halls.destroy', $hall->id) }}" method="POST" style="display:inline;">
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
