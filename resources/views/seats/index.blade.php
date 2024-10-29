@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Seats</h1>
    <a href="{{ route('seats.create') }}" class="btn btn-primary mb-3">Add Seat</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Seat Number</th>
                <th>Type</th>
                <th>Hall</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seats as $seat)
                <tr>
                    <td>{{ $seat->seatNumber }}</td>
                    <td>{{ ucfirst($seat->type) }}</td>
                    <td>{{ $seat->hall->name }}</td> 
                    <td>
                        <a href="{{ route('seats.show', $seat->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('seats.edit', $seat->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('seats.destroy', $seat->id) }}" method="POST" style="display:inline;">
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
